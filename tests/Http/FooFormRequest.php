<?php

namespace Tests\Http;

use Emanci\LumenRequest\FormRequest;

class FooFormRequest extends FormRequest
{
    public function authorize()
    {
        return 'emanci' === $this->input('name');
    }

    public function rules()
    {
        return [
            'name'  => 'required',
            'email'   => 'required',
        ];
    }
}
