<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;


class UserController extends Controller
{

  public function show(User $user)
  {
    // 自分のプロフィール表示
    $this->authorize("view", $user);
    if ($user->shopUser) $user->shopUser->shop;

    $params = [
      "user" => $user,
      "position" => $user->shopUser->position,
      "shop_name" => $user->shopUser->shop->name,
    ];
    return view("user.show", $params);
  }



  public function update(UserUpdateRequest $request, User $user)
  {
    $this->authorize("update", $user);

    if ($request->type === "name") {
      //typeに  "name" と "profile_image" のどちらかが入って飛んでくる
      $user->name = $request->name;
      $user->save();
    } else if ($request->type === "image") {
      //画像
      $user->profile_image = basename($request->file("profile_image")->store("public/images/profile_images"));
      $user->save();
    } else {
      return abort(404);
    }
    return redirect()->back();
  }
}
