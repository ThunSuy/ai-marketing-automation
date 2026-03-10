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

            <input type="text" name="product" placeholder="Enter product name" required />

            <br><br>

            <select name="platform">
                <option value="facebook">Facebook</option>
                <option value="seo">SEO Blog</option>
                <option value="instagram">Instagram</option>
            </select>

            <br><br>

            <textarea name="description" placeholder="Product description"></textarea>

            <br><br>

            <button type="submit">
                Generate
            </button>

        </form>
    </div>

    <?php

    if (isset($_POST['product'])) {

        $product = sanitize_text_field($_POST['product']);
        $platform = sanitize_text_field($_POST['platform']);
        $description = sanitize_textarea_field($_POST['description']);

        $result = ai_generate_content($product, $platform, $description);

        echo "<h3>Result</h3>";
        echo "<p>" . $result . "</p>";

    }

}