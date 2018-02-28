<?php

namespace Tests;

use Emanci\LumenRequest\FormRequestServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Laravel\Lumen\Application;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Tests\Exceptions\Handler;

class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * Needs to be implemented by subclasses.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $app = new Application();

        $app->singleton(ExceptionHandler::class, Handler::class);

        $app->register(FormRequestServiceProvider::class);

        return $app;
    }
}
