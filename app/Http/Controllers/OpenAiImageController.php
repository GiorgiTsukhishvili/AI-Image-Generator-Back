<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpenAiImageRequest;
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


        foreach ($response->data as $data) {
            $data->url; // 'https://oaidalleapiprodscus.blob.core.windows.net/private/...'
            $data->b64_json; // null
        }

        return $response->toArray();
    }
}
