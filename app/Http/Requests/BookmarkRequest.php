<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BookmarkRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */

  public function __construct()
  {
    $user = Auth::user();
    $this->shop_user_id = $user->shopUser->id;
  }


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
      "recipe_id" => ["required", Rule::unique('bookmarks', 'recipe_id')
        ->where(function ($query) {
          $query->where('shop_user_id', $this->shop_user_id);
        })],
    ];
  }

  public function messages()
  {
    return [
      "recipe_id.unique" => "ブックマークが既に存在します",
    ];
  }
}
