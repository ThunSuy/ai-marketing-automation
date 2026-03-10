<?php

namespace App\Strategies;

use App\Contracts\ContentStrategyInterface;
use App\Services\AIService;

class InstagramStrategy implements ContentStrategyInterface
{
    protected $ai;

    public function __construct(AIService $ai)
    {
        $this->ai = $ai;
    }

    public function generate(string $product, string $description)
    {
        $prompt = "
        Create Instagram caption for $product.

        Include:
        - short engaging caption
        - emojis
        - 10 trending hashtags
        ";

        return $this->ai->generate($prompt);
    }
}