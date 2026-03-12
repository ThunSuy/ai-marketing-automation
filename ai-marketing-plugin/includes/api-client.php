<?php

function ai_generate_content($product, $platform, $description)
{

    $response = wp_remote_post(
        'http://127.0.0.1:8000/api/generate',
        [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                'product' => $product,
                'platform' => $platform,
                'description' => $description
            ])
        ]
    );

    if (is_wp_error($response)) {
        return ["error" => "API request failed"];
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    return $data['content'] ?? ["error" => "No response from API"];

}