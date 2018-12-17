<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MenuRepository;
use App\Repositories\UserRepository;
use App\Repositories\SocialRepository;
use App\Repositories\Repository;
use Illuminate\Validation\Rule;
use Validator;
use Auth;
use Hash;
use Lang;
use File;
use App\Repositories\OrderRepository;

class ProfileController extends MasterController
{
    protected $avatarName = null;

    public function __construct(UserRepository $user, OrderRepository $orders) {
        parent::__construct(new SocialRepository(new \App\Social), new MenuRepository(new \App\Menu));

        $this->middleware("auth");

        $this->user_r = $user;
        $this->order_r = $orders;
    }

    /**
     * Показать станицу пользователю
     *
     * @return void
     */
    public function show()
    {
        // dd($this->vars);
        $this->title = "profile";
        return $this->outputView("users.profile");
    }

    /**
     * Редактировать Пользователя
     *
     * @return void
     */
    public function edit()
    {
        $this->title = "edit";
        $user = Auth::user();
        return $this->outputView("users.edit", ["user"], [$user]);
    }

    /**
     * Обновить данные Пользователя
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {

        $data = $request->except("_token", "_method");

        $user = Auth::user();

        $messages = [
            "avatar.dimensions" => "200x200",
        ];

        // dd($data);

        $validator = Validator::make($data, [
            "name" => "required|string|max:100",
            "lastname" => "required|string|max:100",
            // 'email' => ['required', 'email',
            //     Rule::unique('users')->ignore($user->id),
            // ],
            'password' => 'max:50',
            // 'password' => 'confirmed|min:6|max:50',
            "site" => "url|max:20",
            "location" => "required|string|max:255",
            "profession" => "required|string|max:150",
            // "avatar" => ["image",
            //     Rule::dimensions()->maxWidth(500)->maxHeight(500)->ratio(3 / 2),
            // ],
            "avatar" => "dimensions:width=200,height=200",
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile("avatar")) {
            $avatar = $request->file('avatar');
            $this->avatarName = $avatar->getClientOriginalName();

            if($user->avatar) {
                $result = File::deleteDirectory(public_path("fashe") . "\\users\\" . $user->email . "\\");
                $avatar->move(public_path("fashe") . "/users/" . $user->email . "/avatar/", $this->avatarName);
            } else {
                $avatar->move(public_path("fashe") . "/users/" . $user->email . "/avatar/", $this->avatarName);
            }
        } else {
            if (Auth::user()->avatar) {
                $this->avatarName = Auth::user()->avatar;
            }
            // dd(auth()->user()->avatar);
        }

        // dd($user);

        $user->update([
            "avatar" => $this->avatarName,
            "name" => $data["name"],
            "lastname" => $data["lastname"],
            // "email" => $data["email"],
            "site" => $data["site"],
            "password" => isset($data["password"]) ? Hash::make($data["password"]) : $user->password,
            "location" => $data["location"],
            "profession" => $data["profession"],
            // "password" => Hash::make($data["password"]),
        ]);

        return redirect()->route("profile.show", ["id" => $user->id])->with("success", Lang::get("admin.user_updated"));
    }

    /**
     * Посмотреть заказы пользователь
     *
     * @return void
     */
    public function orders()
    {
        $user = Auth::user();

        $this->title = "my_orders";

        $myOrders = $this->order_r->getMyOrders($user->id);

        return $this->outputView("users.orders", "myOrders", $myOrders);
    }
}
