<?php

/*
 * This file is part of questocat/lumen-request package.
 *
 * (c) questocat <zhengchaopu@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tests\Http;

use Questocat\LumenRequest\InputRequest;

class FooInputRequest extends InputRequest
{
    public function authorize()
    {
        return 'questocat' === $this->input('name');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email xxx',
        ];
    }
}
