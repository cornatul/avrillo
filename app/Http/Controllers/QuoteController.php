<?php

namespace App\Http\Controllers;

use App\Contracts\QuoteContract;
use App\Http\Resources\QuoteResource;

class QuoteController extends Controller
{

    private  QuoteContract $quoteManager;

    public function __construct(QuoteContract $quoteManager)
    {
        $this->quoteManager = $quoteManager;
    }

    final public function getQuotes(): QuoteResource
    {
        return  $this->quoteManager->getRandomQuotes(5);
    }

    final public function refreshQuotes(): QuoteResource
    {
        return  $this->quoteManager->refreshQuotes();
    }
}
