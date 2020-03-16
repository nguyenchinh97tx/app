@extends('admin::layouts.master')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                           value="{{ \Request::get('name')}}">
                </div>
                <div class="form-group">
                    <select name="cate" id="" class="form-control">
                        <option value="">Danh mục</option>
                        @if(isset($categories))
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" {{\Request::get('cate') == $category->id ? 'selected':''}}>{{$category->c_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                <a href="{{route('admin.get.create.product')}}" class=" pull-right btn-add" >
                    <i class="fas fa-plus-circle"></i> Thêm</a>
            </form>

        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Nổi bật</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($products))
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td ><span>{{$product->pro_name}}</span>
                            <ul style="padding-left: 0">
                                <div><i class="fas fa-dollar-sign"></i> {{number_format($product->pro_price,0,'.',',')}} (đ)</div>
                                <div><i class="fas fa-dollar-sign"></i>&nbsp -{{$product->pro_sale}} (%)</div>
                            </ul>
                        </td>
                        <td >{{isset($product->category->c_name)?$product->category->c_name:''}}</td>
                        <td>
                            <img src="{{pare_url_file($product->pro_avatar)}}" alt="" class="img img-responsive" style="width: 80px; height: 80px">
                        </td>
                        <td><a class="label {{$product->getClassHot($product->pro_hot)}}"
                               href="{{route('admin.get.action.product',['hot',$product->id])}}">{{$product->getHot($product->pro_hot)}}</a></td>
                        <td><a class="label {{$product->getClassActive($product->pro_active)}}"
                               href="{{route('admin.get.action.product',['active',$product->id])}}">{{$product->getActive($product->pro_active)}}</a></td>
                        <td>
                            <a class="btn-update" href="{{route('admin.get.edit.product',$product->id)}}"><i class="fas fa-pencil-alt"></i> Cập nhật </a>
                            <a class="btn-delete" href="{{route('admin.get.action.product',['delete',$product->id])}}"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
@stop
