<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\Category;

class RecipeCreateRequest extends FormRequest
{
  public function __construct()
  {
    $this->user = Auth::user();
    $this->shop = $this->user->shopUser->shop;
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
      "recipe_name" => ["required", "string", "max:20", Rule::unique("recipes", "name")
        ->where(function ($query) {
          $query->where("shop_id", $this->user->shopUser->id);
        })],
      "category" => ["required", new Category],
      "image" => "required|file|image",
      "description" => "required|max:2000",
    ];
  }

}
