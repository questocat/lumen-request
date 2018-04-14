<?php

/*
 * This file is part of questocat/lumen-request package.
 *
 * (c) questocat <zhengchaopu@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Questocat\LumenRequest;

use Questocat\LumenRequest\Console\RequestMakeCommand;
use Illuminate\Contracts\Validation\ValidatesWhenResolved;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request;

class InputRequestServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->app->afterResolving(ValidatesWhenResolved::class, function ($resolved) {
            if (method_exists($resolved, 'validate')) {
                $resolved->validate();
            } else {
                $resolved->validateResolved();
            }
        });

        $this->app->resolving(InputRequest::class, function ($request, $app) {
            $this->initializeRequest($request, $app['request']);

            $request->setContainer($app);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Register the given commands.
     */
    protected function registerCommands()
    {
        $this->registerRequestMakeCommand();

        $this->commands('command.request.make');
    }

    /**
     * Register the command.
     */
    protected function registerRequestMakeCommand()
    {
        $this->app->singleton('command.request.make', function ($app) {
            return new RequestMakeCommand($app['files']);
        });
    }

    /**
     * Initialize the form request with data from the given request.
     *
     * @param InputRequest $form
     * @param Request      $current
     */
    protected function initializeRequest(InputRequest $form, Request $current)
    {
        $files = $current->files->all();

        $files = is_array($files) ? array_filter($files) : $files;

        $form->initialize(
            $current->query->all(), $current->request->all(), $current->attributes->all(),
            $current->cookies->all(), $files, $current->server->all(), $current->getContent()
        );

        $form->setJson($current->json());

        $form->setUserResolver($current->getUserResolver());

        $form->setRouteResolver($current->getRouteResolver());
    }
}
