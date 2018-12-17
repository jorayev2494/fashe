<?php

namespace App\Http\Controllers\Admin;

use App\Social;
use Illuminate\Http\Request;
use App\Repositories\AdminMenuRepository;
use App\Repositories\SocialRepository;
use App\AdminMenu;
use Validator;

class SocialsController extends AdminMasterController
{

    public function __construct(SocialRepository $socials) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_social_r = $socials;
    }

    public function index()
    {
        $this->adn_title = "socials";
        $socials = $this->adn_social_r->get();
        return $this->outputAdminView("admin.pages.socials.index", "socials", $socials);
    }

    public function create()
    {
        $this->adn_title = "social_create";
        return $this->outputAdminView("admin.pages.socials.create");
    }

    public function store(Request $request)
    {
        $data = $request->except("_token");

        $rules = [
            "social_title"  => "required|alpha|min:2|max:100",
            "social_icon"   => "required|min:2|max:100",
            "social_url"    => "required|url|min:2|max:100",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $this->adn_social_r->create([
            "title"     => $data["social_title"],
            "icon"      => $data["social_icon"],
            "url"       => $data["social_url"],
            "active"    => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "social_created");

        return redirect()->route('admin.socials.index');
    }

    public function show($id)
    {
        $this->adn_title = "social_info";
        $social = $this->adn_social_r->getById($id);
        return $this->outputAdminView("admin.pages.socials.info", "social", $social);
    }

    public function edit($id)
    {
        $this->adn_title = "social_edit";
        $social = $this->adn_social_r->getById($id);
        return $this->outputAdminView("admin.pages.socials.edit", "social", $social);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "_method");

        $rules = [
            "social_title"  => "required|alpha|min:2|max:100",
            "social_icon"   => "required|min:2|max:100",
            "social_url"    => "required|url|min:2|max:100",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $social = $this->adn_social_r->getById($id)->update([
            "title"     => $data["social_title"],
            "icon"      => $data["social_icon"],
            "url"       => $data["social_url"],
            "active"    => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "social_updated");

        return redirect()->route('admin.socials.index');
    }

    public function destroy($id)
    {
        $category = $this->adn_social_r->getById($id)->delete();

        $this->sessionAlert("success", "social_deleted");
        return redirect()->route('admin.socials.index');
    }

}
