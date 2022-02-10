<?php

namespace Tests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Testing\TestResponse;
use PHPUnit\Framework\Assert;
use Tests\Support\FirstSetup;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    // protected $faker;

    public function setUp():void {
        parent::setUp();
        if (env('DB_DATABASE') !== 'izitime_unit_test' && env('DB_HOST') !== '51.68.37.45') {
            $this->artisan('passport:install');
            $this->artisan('passport:client --personal');
        }
        // For middleware tests
        TestResponse::macro('assertMiddlewarePassed', function () {
            Assert::assertEquals('__passed__', $this->content());
        });
    }

    /**
     * Boot the testing helper traits.
     *
     * @return array
     */
    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();
        if (isset($uses[FirstSetup::class])) {
            $this->appFirstSetup();
        }
    }

    /**
     * Call the given middleware.
     *
     * @param  string|string[]  $middleware
     * @param  string  $method
     * @param  array  $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function callMiddleware($middleware, $method = 'GET', array $data = [])
    {
        return $this->call(
            $method, $this->makeMiddlewareRoute($method, $middleware), $data
        );
    }

    /**
     * Call the given middleware using a JSON request.
     *
     * @param  string|string[]  $middleware
     * @param  string  $method
     * @param  array  $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function callMiddlewareJson($middleware, $method = 'GET', array $data = [])
    {
        return $this->json(
            $method, $this->makeMiddlewareRoute($method, $middleware), $data
        );
    }

    /**
     * Make a dummy route with the given middleware applied.
     *
     * @param  string  $method
     * @param  string|string[]  $middleware
     * @return string
     */
    protected function makeMiddlewareRoute($method, $middleware)
    {
        $method = strtolower($method);
        return $this->app->make('router')->{$method}('/__middleware__', [
            'middleware' => $middleware,
            function () {
                return '__passed__';
            }
        ])->uri();
    }
}
