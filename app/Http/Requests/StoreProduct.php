<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:6|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'visible' => 'required|boolean',
            'state' => 'required|in:solde,standard',
            'reference' => 'required|string|size:16',
            'category_id' => 'required|exists:categories,id',
            "size" => "required",
            "size.*" => "in:XS,S,M,L,XL"
        ];
    }
}
