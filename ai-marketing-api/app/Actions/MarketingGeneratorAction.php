<?php

namespace App\Actions;

use App\Services\AIService;
use App\Strategies\FacebookStrategy;
use App\Strategies\SeoStrategy;
use App\Strategies\InstagramStrategy;

class MarketingGeneratorAction
{
    protected $ai;

    public function __construct(AIService $ai)
    {
        $this->ai = $ai;
    }

    public function execute($platform, $product, $description)
    {
        switch ($platform) {

            case "facebook":
                $strategy = new FacebookStrategy($this->ai);
                break;

            case "seo":
                $strategy = new SeoStrategy($this->ai);
                break;

            case "instagram":
                $strategy = new InstagramStrategy($this->ai);
                break;

            default:
                throw new \Exception("Platform not supported");
        }

        return $strategy->generate($product, $description);
    }
}