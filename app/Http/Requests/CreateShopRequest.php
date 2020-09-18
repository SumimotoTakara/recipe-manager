<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShopRequest extends FormRequest
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
    return
      [
        "shop_name" => "required|string|max:10",
        "shop_auth_id" => "required|string|alpha_num|between:6,10|unique:shops,auth_id"
      ];
  }

  public function messages()
  {
    return [
      "shop_auth_id.unique" => "そのショップIDは使えません。"
    ];
  }
}
