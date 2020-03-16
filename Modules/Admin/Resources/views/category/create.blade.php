@extends('admin::layouts.master')
@section('content')

    <h2 class="page-header">Thêm mới danh mục</h2>
    <div class="">
<div class="row">
    <div class="col-sm-12">
        @include('admin::category.form');
    </div>
</div>

            </div>

@stop
