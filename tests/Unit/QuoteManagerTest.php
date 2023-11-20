<?php

namespace Tests\Unit;

use App\Contracts\QuoteContract;
use App\Http\Resources\QuoteResource;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class QuoteManagerTest extends TestCase
{
    /**
     * A basic unit test example.
     * @throws Exception
     */
    public function testQuoteManager(): void
    {
        //mock the interface QuoteContract
        $quoteContract = $this->createMock(QuoteContract::class);
        //assert response is QuoteResource
        $this->assertInstanceOf(
            QuoteContract::class,
            $quoteContract
        );

        $response = $quoteContract->getRandomQuotes(5);
        $this->assertIsObject($response);
        $this->assertInstanceOf(QuoteResource::class, $response);
    }
}
