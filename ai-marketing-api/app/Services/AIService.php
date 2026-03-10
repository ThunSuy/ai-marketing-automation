<?php

namespace App\Services;

class AIService
{
    public function generate($prompt)
    {
        return "AI Generated Content based on prompt: " . $prompt;
    }
}