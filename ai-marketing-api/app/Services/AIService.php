<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AIService
{
    public function generate($prompt)
    {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type' => 'application/json'
        ])->post(
                'https://openrouter.ai/api/v1/chat/completions',
                [
                    "model" => "meta-llama/llama-3-8b-instruct",
                    "messages" => [
                        [
                            "role" => "user",
                            "content" => $prompt
                        ]
                    ]
                ]
            );

        // return $response->json();
        $data = $response->json();
        $content = $data['choices'][0]['message']['content'] ?? "{}";

        /* Extract JSON from AI response */

        preg_match('/\{.*\}/s', $content, $matches);

        $json = $matches[0] ?? "{}";

        $result = json_decode($json, true);

        return $result ?? ["raw" => $content];
    }
}