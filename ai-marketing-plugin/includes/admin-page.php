<?php

add_action('admin_menu', 'ai_marketing_menu');

function ai_marketing_menu()
{

    add_menu_page(
        'AI Marketing Generator',
        'AI Marketing',
        'manage_options',
        'ai-marketing',
        'ai_marketing_page',
        'dashicons-chart-bar'
    );

}

function ai_marketing_page()
{
    ?>

    <div class="wrap">

        <h1>AI Marketing Generator</h1>

        <form method="post">

            <input type="text" name="product" placeholder="Enter product name" />

            <button type="submit">
                Generate
            </button>

        </form>

    </div>

    <?php

    if (isset($_POST['product'])) {

        $product = sanitize_text_field($_POST['product']);

        $result = ai_generate_content($product);

        echo "<h3>Result</h3>";
        echo "<p>" . $result . "</p>";

    }

}