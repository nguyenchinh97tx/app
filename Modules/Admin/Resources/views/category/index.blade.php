@extends('admin::layouts.master')

@section('content')

    <div class="table-responsive">
        <a href="{{route('admin.get.create.category')}}" class=" pull-right btn-add" >
            <i class="fas fa-plus-circle"></i> Thêm</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Title Seo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($categories))
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->c_name}}</td>
                    <td>{{$category->c_title_seo}}</td>
                    <td> <a href="{{route('admin.get.action.category',['active',$category->id])}}" class="label {{$category->getClassStatus($category->c_active)}}">{{$category->getStatus($category->c_active)}}</a>
                        </td>
                    <td>
                        <a class="btn-update" href="{{route('admin.get.edit.category',$category->id)}}"><i class="fas fa-pencil-alt"></i> Cập nhật</a>
                        <a class="btn-delete" href="{{route('admin.get.action.category',['delete',$category->id])}}"><i class="fas fa-trash-alt"></i> Xóa</a>
                    </td>
                </tr>
            @endforeach
                @endif

            </tbody>
        </table>
    </div>
    @stop
