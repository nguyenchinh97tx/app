@extends('admin::layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <form class="form-inline" style="margin-bottom: 20px">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên bài viết"
                           value="{{ \Request::get('name')}}">
                </div>

                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                <a href="{{route('admin.get.create.article')}}" class=" pull-right btn-add" >
                    <i class="fas fa-plus-circle"></i> Thêm</a>
            </form>

        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Bài viết</th>
                <th>Mô tả</th>
                <th>Ngày đăng</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($articles))
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->a_name}}</td>
                        <td>{{$article->a_description}}</td>
                        <td>{{$article->created_at}}</td>
                        <td><a class="label {{$article->getClassActive($article->a_active)}}"
                               href="{{route('admin.get.action.article',['active',$article->id])}}">{{$article->getActive($article->a_active)}}</a></td>
                        <td>
                            <a class="btn-update" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pencil-alt"></i> Cập nhật </a>
                            <a class="btn-delete"href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>
@stop
