<?php

namespace App\Contracts;

interface ContentStrategyInterface
{
    public function generate(string $product, string $description);
}