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
        Generate a Facebook marketing post.

        Product: $product
        Description: $description

        Return ONLY JSON format like this:

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