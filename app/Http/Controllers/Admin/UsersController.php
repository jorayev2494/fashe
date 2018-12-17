<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\AdminMenu;
use Validator;
use App\Repositories\UserRepository;
use App\Repositories\AdminMenuRepository;
use App\Http\Requests\UserRequest;
use Illuminate\Validation\Rule;
use App\User;
use Storage;
use Hash;
use Lang;
use File;
use App\Repositories\RoleRepository;

class UsersController extends AdminMasterController
{

    protected $avatarName = null;

    public function __construct(UserRepository $users, RoleRepository $roles) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_user_r = $users;
        $this->adn_role_r = $roles;
    }


    public function index()
    {
        $this->adn_title = "users";
        $defAva = $this->adn_user_r->defaultAva();
        $users = $this->adn_user_r->get();
        return $this->outputAdminView("admin.pages.users.index", ["defAva", "users"], [$defAva, $users]);
    }


    public function create()
    {
        $this->adn_title = "creating_user";
        $defaultAva = User::defaultAvatar();
        $roles = $this->adn_role_r->getActive();
        // dd($roles);
        return $this->outputAdminView("admin.pages.users.create", ["defaultAva", "roles"], [$defaultAva, $roles]);
    }


    public function store(UserRequest $request)
    {
        $data = $request->except("_token");
        $validator = Validator::make($data, $request->rules());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile("avatar")) {
            $avatar = $request->file('avatar');
            $this->avatarName = $avatar->getClientOriginalName();
            $avatar->move(public_path("fashe") . "/users/" . $data["email"] . "/avatar/", $this->avatarName);
        }

        $user = User::create([
            "name" => $data["name"],
            "lastname" => $data["lastname"],
            "avatar" => $this->avatarName,
            "email" => $data["email"],
            "role_id"  => $data["role"],
            "site" => $data["site"],
            "location" => $data["location"],
            "profession" => $data["profession"],
            "password" => Hash::make($data["password"]),
        ]);

        return redirect()->route("admin.users.index")->with("success", Lang::get("admin.user_created"));
    }


    public function show($id)
    {
        $this->adn_title = "profile_user";
        $user = $this->adn_user_r->getStrictlyById($id);
        return $this->outputAdminView("admin.pages.users.profile", "user", $user);
    }


    public function edit($id)
    {
        if (is_numeric($id)) {

            $user = $this->adn_user_r->getById($id);
            $roles = $this->adn_role_r->getActive();

        } else {
            return response()->json(false, 200);
        }
        $this->adn_title = "edit_user";

        return $this->outputAdminView('admin.pages.users.edit', ["user", "roles"], [$user, $roles]);

    }


    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "_method");


        $user = User::find($id);

        $validator = Validator::make($data, [
            "name" => "required|string|max:100",
            "lastname" => "required|string|max:100",
            'email' => ['required', 'email',
                Rule::unique('users')->ignore($user->id),
            ],
            "role"  => "required|numeric",
            'password' => 'confirmed|min:6|max:50',
            "site" => "url|max:20",
            "location" => "string|max:255",
            "profession" => "string|max:150",
            "avatar" => "image",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile("avatar")) {
            $avatar = $request->file('avatar');
            $this->avatarName = $avatar->getClientOriginalName();

            if($user->avatar) {
                $result = File::deleteDirectory(public_path("fashe") . "\\users\\" . $user->email . "\\");
                $avatar->move(public_path("fashe") . "/users/" . $data["email"] . "/avatar/", $this->avatarName);
            } else {
                $avatar->move(public_path("fashe") . "/users/" . $data["email"] . "/avatar/", $this->avatarName);
            }
        } else {
            $this->avatarName = $user->avatar;
        }

        $user->update([
            "avatar" => $this->avatarName,
            "name" => $data["name"],
            "lastname" => $data["lastname"],
            "email" => $data["email"],
            "role_id"   => $data["role"],
            "site" => $data["site"],
            // "password" => $data["password"],
            "location" => $data["location"],
            "profession" => $data["profession"],
            "password" => Hash::make($data["password"]),
        ]);

        return redirect()->route("admin.users.show", ["id" => $user->id])->with("success", Lang::get("admin.user_updated"));

    }


    public function destroy($id)
    {
        $user = User::findOrfail($id);

        if ($user->avatar) {
            $result = File::deleteDirectory(public_path("fashe") . "\\users\\" . $user->email . "\\");
        }

        $user->delete();

        $this->sessionAlert("success", "user_deleted");

        return redirect()->route("admin.users.index");
    }
}
