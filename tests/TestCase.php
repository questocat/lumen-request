<?php

/*
 * This file is part of questocat/lumen-request package.
 *
 * (c) questocat <zhengchaopu@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests;

use Questocat\LumenRequest\InputRequestServiceProvider;
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

        $app->register(InputRequestServiceProvider::class);

        return $app;
    }
}
