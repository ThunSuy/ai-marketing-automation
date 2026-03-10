<?php
/*
Plugin Name: AI Marketing Generator
Description: Generate marketing content using AI
Version: 1.0
Author: Your Name
*/

add_action('admin_menu', 'ai_marketing_menu');

function ai_marketing_menu()
{
    add_menu_page(
        'AI Marketing',
        'AI Marketing',
        'manage_options',
        'ai-marketing',
        'ai_marketing_page',
        'dashicons-chart-line',
        20
    );
}

function ai_marketing_page()
{

    if (isset($_POST['product'])) {

        $product = sanitize_text_field($_POST['product']);

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

        echo "<h3>Generated Content</h3>";
        echo "<p>" . $data['content'] . "</p>";

    }

    ?>
    <div class="wrap">
        <h1>AI Marketing Generator</h1>

        <form method="post">
            <input type="text" name="product" placeholder="Product name" />
            <button type="submit">Generate</button>
        </form>
    </div>

    <?php
}