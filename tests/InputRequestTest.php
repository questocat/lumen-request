<?php

/*
 * This file is part of emanci/lumen-request package.
 *
 * (c) emanci <zhengchaopu@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests;

use Illuminate\Http\Request;
use Tests\Http\FooInputRequest;

class InputRequestTest extends TestCase
{
    public function testValidationFailed()
    {
        $input = [
            'name' => 'emanci',
        ];

        $response = $this->storeFoo($input);

        $this->assertEquals(422, $response->getStatusCode());

        $this->assertEquals($response->getContent(), json_encode(['email' => ['email xxx']]));
    }

    public function testValidationPass()
    {
        $input = [
            'name' => 'emanci',
            'email' => 'zhengchaopu@gmail.com',
        ];

        $response = $this->storeFoo($input);

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertEquals(json_encode($input), $response->getContent());
    }

    /**
     * @expectedException        \Illuminate\Validation\UnauthorizedException
     * @expectedExceptionMessage
     */
    public function testValidationForAuthorizationException()
    {
        $input = [
            'name' => 'foobar',
            'email' => 'zhengchaopu@gmail.com',
        ];

        $response = $this->storeFoo($input);
    }

    protected function storeFoo(array $input)
    {
        $this->app->router->addRoute(['POST'], '/foo/store', function (FooInputRequest $request) {
            return response($request->all());
        });

        return $this->app->handle(Request::create('/foo/store', 'POST', $input));
    }
}
