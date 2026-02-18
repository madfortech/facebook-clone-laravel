<?php

declare(strict_types=1);

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PaginatedResponseFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();

        $pagination = Post::query()
            ->withAuthor()
            ->withStats()
            ->withIsLiked()
            ->withIsSaved()
            ->withIsHidden()
            ->fromUserAndFriends($user)
            ->whichNotHidden()
            ->latest()
            ->paginate(10, [
                'id',
                'content',
                'file',
                'author_id',
                'commenting',
                'created_at',
                'updated_at',
            ]);

        return PaginatedResponseFacade::response(PostResource::class, $pagination);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request): JsonResponse
    {
        
        $paths = [];

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $path = $image->store('posts', 'public');

                $paths[] = str_replace('public', '', $path);
            }
        }

        $post = $request->user()->posts()->create([
            'content' => $request->validated('content'),
            'file' => $paths,
        ]);

        return (new PostResource($post))
            ->response()
            ->setStatusCode(201);
    }
    
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, UpdateRequest $request): Response
    {
        $data = $request->validated();

        $paths = collect($post->file);

        if (isset($data['fileToDelete'])) {
            $paths = $paths->diff($data['fileToDelete']);

            Storage::disk('public')->delete($data['fileToDelete']);
        }

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $image) {
                $path = $image->store('posts', 'public');

                $paths->push(str_replace('public', '', $path));
            }
        }

        $post->update([
            'content' => $request->validated('content', $post->content),
            'file' => $paths,
        ]);

        return response()->noContent();
    }

    public function destroy(Post $post): Response
    {
        $this->authorize('delete', [Post::class, $post]);

        $post->delete();

        return response()->noContent();
    }
}
