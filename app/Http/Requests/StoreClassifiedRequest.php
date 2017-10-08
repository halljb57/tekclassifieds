<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreClassifiedRequest extends  FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'title'         => 'required',
            'category_id'   => 'required',
            'price'         => 'required',
            'email'         => 'required'
        ];
    }
}
