<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenAiImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'prompt' => 'required|string'
        ];
    }
}
