<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Repositories\SlideRepository;
use App\Repositories\AdminMenuRepository;
use App\AdminMenu;
use Validator;
use File;

class SlidersController extends AdminMasterController
{

    public $imageName = false;

    public function __construct(SlideRepository $sliders) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_slider_r = $sliders;
    }


    public function index()
    {
        $this->adn_title = "sliders";
        $sliders = $this->adn_slider_r->get();
        return $this->outputAdminView("admin.pages.sliders.index", "sliders", $sliders);
    }


    public function create()
    {
        $this->adn_title = "create_slider";
        $defaultImage = asset('fashe') . "/sliders/default/no-image.jpg";
        return $this->outputAdminView("admin.pages.sliders.create", "defaultImage", $defaultImage);
    }


    public function store(Request $request)
    {
        $data = $request->except("_token");

        // dd($data);

        $rules = [
            "slider_title" => "required|min:2|max:20",
            "slide_info"  => "required|min:2|max:100",
            "slider_link" => "required|min:2|max:100",  // alpha_dash|
            "image" => "required|dimensions:width=1920,height=570",
            // "image" => "dimensions:width=1920,height=239",
        ];

        $messages = [
            "image.dimensions" => "1920x570",
            "image.required"    =>  "Поле Изображение обязательно для заполнения.",
        ];

        // dd($data, $this->imageName);

        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $this->imageName = $image->getClientOriginalName();
            // $image->move(public_path("fashe") . "/sliders/image/" . $slider->id . "/", $this->imageName);
        }



        $slider = $this->adn_slider_r->create([
            "title"     =>  $data["slider_title"],
            "info"      =>  $data["slide_info"],
            "link"      =>  $data["slider_link"],
            "image"     =>  $this->imageName,
            "active"    =>  isset($data["active"]) ? true : false,
        ]);


        $image->move(public_path("fashe") . "/sliders/image/" . $slider->id . "/", $this->imageName);

        $this->sessionAlert("success", "slider_created");

        return redirect()->route('admin.sliders.index');

    }


    public function show($id)
    {
        $this->adn_title = "slider_info";
        $slider = $this->adn_slider_r->getById($id);
        return $this->outputAdminView("admin.pages.sliders.info", "slider", $slider);
    }


    public function edit($id)
    {
        $this->adn_title = "category_edit";
        $slider = $this->adn_slider_r->getById($id);
        return $this->outputAdminView("admin.pages.sliders.edit", "slider", $slider);
    }


    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "method");

        $slider = $this->adn_slider_r->getById($id);

        $rules = [
            "slider_title" => "required|min:2|max:50",
            "slider_info"  => "required|min:2|max:100",
            "slider_link"  => "required|min:2|max:50",  // alpha_dash|
            "image" => "dimensions:width=1920,height=570",
            // "image" => "dimensions:width=1920,height=239",
        ];

        $messages = [
            "image.dimensions" => "1920x570",
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $this->imageName = $image->getClientOriginalName();

            if($slider->image) {
                $result = File::deleteDirectory(public_path("fashe") . "\\sliders\\image\\" . $slider->id);
                $image->move(public_path("fashe") . "/sliders/image/" . $slider->id . "/", $this->imageName);
                // dd($data["slider_link"]);
            } else {
                $this->imageName = $slider->getImage();
            }
        } else {
            $this->imageName = $slider->image;
        }


        $slider->update([
            "title" => $data["slider_title"],
            "info" => $data["slider_info"],
            "link" => $data["slider_link"],
            "image"  => $this->imageName,
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "slider_updated");

        return redirect()->route('admin.sliders.index');
    }


    public function destroy($id)
    {
        $slider = $this->adn_slider_r->getById($id);

        if ($slider->image) {
            $result = File::deleteDirectory(public_path("fashe") . "\\sliders\\image\\" . $slider->id . "\\");
            // dd($result);
        }

        $slider->delete();

        $this->sessionAlert("success", "slider_deleted");
        return redirect()->route('admin.sliders.index');
    }
}
