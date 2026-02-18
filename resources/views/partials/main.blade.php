<div class="lg:grid grid-flow-col grid-rows-3 gap-4">
    <div class="row-span-3">
        <!-- Card -->
         @foreach (($posts ?? collect()) as $post)
            <div class="max-w-sm rounded overflow-hidden shadow-lg py-2 px-4">
                <iframe class="aspect-video" src="{{ $post->video }}"
                    alt="{{ $post->id }}"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>

                </iframe>

                <div class="px-6 py-4">
                    
                    <div class="font-bold text-xl mb-2">{{ $post->content }}</div>
                    
                </div>
                <div class="flex items-center">
                    <flux:avatar name="{{ $post->author->name }}" size="sm" circle />
                    <div class="text-sm ml-2">
                        <p class="text-black leading-none">  {{ $post->author->name }}</p>
                        <p class="text-grey-dark">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    
                </div>

                <div class="px-6 py-4">
                    @if(auth()->id() === $post->author_id)
                        <flux:link href="{{ route('posts.edit', $post->id) }}">Edit</flux:link>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <flux:button variant="danger" type="submit" color="red">
                                Delete
                            </flux:button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
            
        <!-- End Card -->
    </div>
    <div class="col-span-2">02</div>

    <div class="col-span-2 row-span-2">
        <!-- Contact List -->
        <div class="relative">
            <div class="fixed top-0 right-0 left-0">Contacts</div>
                <div class="mt-12">
                    <flux:skeleton />

                    <div class="overflow-auto h-52 mt-4">
                        <div class="flex items-center">
                            <flux:avatar name="John Doe" size="sm" circle />
                            <div class="text-sm ml-2">
                                <flux:link href="#">john doe</flux:link> 
                            </div>
                    </div>

                    </div>
                    <!-- ... -->
                </div>
            </div>
        </div>
        <!-- End Contact List -->

        
    </div>
</div>