<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = Category::select('id','c_name','c_title_seo','c_active')->get();
        $viewData = [
            'categories'=>$categories
        ];

        return view('admin::category.index',$viewData);
    }
    public function create(){
        return view('admin::category.create');
    }
    public function store(RequestCategory $requestCategory){
//        dd($requestCategory->all());
        $this->gettext($requestCategory);
        return redirect()->back();
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

    public function update(RequestCategory $requestCategory, $id){
        $this->gettext($requestCategory,$id);
        return redirect()->route('admin.get.list.category');
    }
    public function gettext(RequestCategory $requestCategory, $id=''){
        try{
            $category = new Category();
            if($id){
                $category = Category::find($id);
            }
            $category ->c_name = $requestCategory->name;
            $category->c_slug = Str::slug($requestCategory->name);
            $category->c_icon = Str::slug($requestCategory->icon);
            $category->c_title_seo = $requestCategory->c_title_seo?$requestCategory->c_title_seo:$requestCategory->name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->c_keyword_seo = $requestCategory->c_keyword_seo;
            $category->save();
        }
        catch (Exception $e){
            Log::error($e);
        }
    }
    public function action($action,$id){
        if($action){
            $category = Category::find($id);
            switch ($action){
                case 'delete':
                    $category->delete();
                    break;
                case 'active':
                    $category->c_active == 0 ? $category->c_active= 1 : $category->c_active = 0;
                    $category->save();
                    break;
            }

        }
        return redirect()->back();
    }
}
