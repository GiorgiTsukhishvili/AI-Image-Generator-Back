<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpenAiImageRequest;
use App\Models\OpenAiImage;
use Illuminate\Http\Request;

class OpenAiImageController extends Controller
{
    public function store(OpenAiImageRequest $request, \OpenAI\Client $client)
    {
        $response = $client->images()->create([
            'prompt' => $request->prompt,
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);

        $data = [
            'user_id' => auth()->user()->id,
            'description' => $request->prompt,
            'image' => $response->toArray()['data'][0]['url']
        ];

        $image = OpenAiImage::create($data);

        return response()->json(['message' => 'Image created successfully', 'data' => $image], 201);
    }
}
