<?php

function ai_generate_content($product)
{

    $response = wp_remote_post(
        'http://127.0.0.1:8000/api/generate',
        [
            'body' => [
                'product' => $product
            ]
        ]
    );

    $body = wp_remote_retrieve_body($response);

    $data = json_decode($body, true);

    return $data['content'];

}