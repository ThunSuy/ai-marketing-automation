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
        // dd($data);

        return $data['choices'][0]['message']['content'] ?? "No response";
    }
}