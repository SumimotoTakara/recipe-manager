<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Http\Requests\CreateShopRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;

class ShopController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
      $this->user = Auth::user();
      if ($this->user->shopUser) {
        return redirect(RouteServiceProvider::HOME);
      }
      return $next($request);
    });
  }

  public function create()
  {
    $params = ["user" => $this->user];
    return view("shop.create", $params);
  }


  public function store(CreateShopRequest $request)
  {
    $shop = Shop::create([
      "name" => $request->shop_name,
      "auth_id" => $request->shop_auth_id,
    ]);
    $shop->makeOwner($this->user->id);
    return redirect(RouteServiceProvider::HOME);
  }
}
