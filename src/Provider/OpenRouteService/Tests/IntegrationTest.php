<?php

declare(strict_types=1);

/*
 * This file is part of the Geocoder package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license    MIT License
 */

namespace Geocoder\Provider\OpenRouteService\Tests;

use Geocoder\IntegrationTest\ProviderIntegrationTest;
use Geocoder\Provider\OpenRouteService\OpenRouteService;
use Psr\Http\Client\ClientInterface;

/**
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
class IntegrationTest extends ProviderIntegrationTest
{
    protected array $skippedTests = [
        'testReverseQueryWithNoResults' => 'We weirdly find stuff here...',
    ];

    protected bool $testIpv4 = false;

    protected bool $testIpv6 = false;

    protected function createProvider(ClientInterface $httpClient)
    {
        return new OpenRouteService($httpClient, $this->getApiKey());
    }

    protected function getCacheDir(): string
    {
        return __DIR__.'/.cached_responses';
    }

    protected function getApiKey(): string
    {
        return $_SERVER['OPEN_ROUTE_SERVICE_API_KEY'];
    }
}
