<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\Category;

class RecipeUpdateRequest extends FormRequest
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

  public function rules()
  {
    return [
      "recipe_name" => ["required", "string", "max:20", Rule::unique("recipes", "name")
        ->ignore($this->recipe)
        ->where(function ($query) {
          $query->where("shop_id", $this->user->shopUser->id);
        })],
      "category" => ["required", new Category],
      "image" => "file|max:4000|image",
      "description" => "required|max:2000",
    ];
  }
}
