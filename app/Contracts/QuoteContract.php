<?php
declare(strict_types=1);
namespace App\Contracts;

use App\Http\Resources\QuoteResource;

interface QuoteContract
{
    public function getRandomQuotes(int $howMany): QuoteResource;

    public function refreshQuotes(): QuoteResource;
}