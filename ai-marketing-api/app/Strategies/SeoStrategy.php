<?php

namespace App\Strategies;

use App\Contracts\ContentStrategyInterface;
use App\Services\AIService;

class SeoStrategy implements ContentStrategyInterface
{
    protected $ai;

    public function __construct(AIService $ai)
    {
        $this->ai = $ai;
    }

    public function generate(string $product, string $description)
    {
        $prompt = "
        Generate SEO blog content for product: $product.

        Include:
        - SEO title
        - meta description
        - 10 keywords
        - blog outline
        ";

        return $this->ai->generate($prompt);
    }
}