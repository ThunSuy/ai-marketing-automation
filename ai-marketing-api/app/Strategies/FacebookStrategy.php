<?php

namespace App\Strategies;

use App\Contracts\ContentStrategyInterface;
use App\Services\AIService;

class FacebookStrategy implements ContentStrategyInterface
{
    protected $ai;

    public function __construct(AIService $ai)
    {
        $this->ai = $ai;
    }

    public function generate(string $product, string $description)
    {
        $prompt = "
        Write a Facebook marketing post for product: $product.

        Description: $description

        Include:
        - engaging caption
        - call to action
        - 5 hashtags
        ";

        return $this->ai->generate($prompt);
    }
}