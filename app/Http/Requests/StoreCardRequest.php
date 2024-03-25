<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
{
    public function authorize()
    {
        //check if use validated to update
        if ($this->user()->cannot('update-card', $this->route('card'))) {
            return false;
        }

        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:70'],

        ];
    }
}
