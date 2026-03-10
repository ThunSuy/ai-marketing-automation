<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarketingController;

Route::post('/generate', [MarketingController::class, 'generate']);