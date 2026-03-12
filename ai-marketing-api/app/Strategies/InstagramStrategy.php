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
        Generate an Instagram marketing caption.

        Product: $product
        Description: $description

        Requirements:
        - short engaging caption
        - include emojis
        - include 8-10 trending hashtags
        - include call to action

        Return ONLY JSON in this format:

        {
        \"title\": \"...\",
        \"caption\": \"...\",
        \"hashtags\": [\"#...\",\"#...\"],
        \"cta\": \"...\"
        }
        ";

        return $this->ai->generate($prompt);
    }
}