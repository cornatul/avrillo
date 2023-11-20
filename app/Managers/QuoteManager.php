<?php
declare(strict_types=1);
namespace App\Managers;

use App\Contracts\QuoteContract;
use App\Http\Resources\QuoteResource;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;

class QuoteManager implements QuoteContract
{

    private string $url = 'https://api.kanye.rest/';
    public function __construct(protected  readonly  ClientInterface $client)
    {

    }

    /**
     * @throws GuzzleException
     */
    final public function getRandomQuotes(int $howMany = 5): QuoteResource
    {

        $collection = collect();

        for ($i=0; $i < $howMany; $i++){

            $response = $this->client->request('GET', $this->url);

            $data = json_decode($response->getBody()->getContents(), true);

            $collection->push($data);
        }

        return Cache::remember('random_quotes', now()->addMinutes(10), function () use ($collection) {
            return new QuoteResource($collection->unique()->toArray());
        });

    }


    /**
     * @throws GuzzleException
     */
    final public function refreshQuotes(): QuoteResource
    {
        Cache::forget('random_quotes');

        return $this->getRandomQuotes();
    }
}