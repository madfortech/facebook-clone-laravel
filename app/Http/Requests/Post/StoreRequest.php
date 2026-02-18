<?php

declare(strict_types=1);

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'content' => [
                'nullable',
                'required_without:file',
                'string',
                'min:2',
                'max:1000',
            ],

           
            'file' => [
                'nullable',
                'required_without:content',
                'file',
                'array',
                'max:51200', // 50MB in KB
            ],


            'file.*' => [
                'required',
                File::types(['mp3', 'wav', 'mp4'])
                    ->max(12 * 1024),
            ],
        ];
    }
}
