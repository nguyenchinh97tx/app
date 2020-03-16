<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index( Request $request){
        $products  = Product::with('category:id,c_name');
        if($request->name) $products->where('pro_name','like','%'.$request->name.'%');
        if($request->cate) $products->where('pro_category_id',$request->cate);
        $products=$products->orderByDesc('id')->paginate(10);
        $categories = $this->getCategories();
        $viewData = [
          'products' => $products,
          'categories' => $categories
        ];
        return view('admin::product.index',$viewData);
    }
    public function create(){
        $categories = $this->getCategories();
        return view('admin::product.create',compact('categories'));
    }
    public function store(RequestProduct $requestProduct){
        $this->getInfo($requestProduct);
        return redirect()->route('admin.get.list.product');
//        dd($requestProduct->all());
    }
    public function getCategories(){
        return Category::all();
    }
    public function getInfo(RequestProduct $requestProduct, $id=''){
        $product = new Product();
        if($id) {
            $product = Product::find($id);
        }
        $product->pro_name=$requestProduct->pro_name;
        $product->pro_slug=Str::slug($requestProduct->pro_name);
        $product-> pro_category_id = $requestProduct->pro_category_id;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_price=$requestProduct->pro_price;
        $product->pro_sale=$requestProduct->pro_sale;
        $product->pro_description_seo = $requestProduct->pro_description_seo?$requestProduct->pro_description_seo:$requestProduct->pro_name;
        $product->pro_title_seo = $requestProduct->pro_title_seo?$requestProduct->pro_title_seo:$requestProduct->pro_name;

        $file = upload_image('avatar');
        if(isset($file['name'])){
            $product->pro_avatar = $file['name'];
        }

        $product->save();
    }
    public function edit($id){
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update',compact('categories','product'));
    }

    public function update(RequestProduct $requestProduct, $id){
        $this->getInfo($requestProduct,$id);
        return redirect()->route('admin.get.list.product');
    }
    public function action($action,$id){
        if($action){
            $product = Product::find($id);
            switch ($action){
                case 'delete':
                    $product->delete();
                    break;
                case 'hot':
                    $product->pro_hot == 0 ? $product->pro_hot= 1 : $product->pro_hot = 0;
                    $product->save();
                    break;
                case 'active':
                    $product->pro_active == 0 ? $product->pro_active= 1 : $product->pro_active = 0;
                    $product->save();
                    break;
            }

        }
        return redirect()->back();
    }
}
