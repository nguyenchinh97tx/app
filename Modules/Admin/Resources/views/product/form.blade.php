<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8">
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                   value="{{old('pro_name',isset($product->pro_name)?$product->pro_name:'')}}" name="pro_name">
            @if($errors->has('pro_name'))
                <div class="error-text">
                    {{$errors->first('pro_name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Mô tả </label>
            <textarea class="form-control" id="" cols="30" rows="3" name="pro_description"
                      placeholder="Nhập mô tả">{{old('pro_description',isset($product->pro_description)?$product->pro_description:'')}}</textarea>
            @if($errors->has('pro_description'))
                <div class="error-text">
                    {{$errors->first('pro_description')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Nội dung</label>
            <textarea class="form-control" name="pro_content" id="pro_content" cols="30" rows="3"
                      placeholder="Nhập nội dung">{{old('pro_content',isset($product->pro_content)?$product->pro_content:'')}}</textarea>
            @if($errors->has('pro_content'))
                <div class="error-text">
                    {{$errors->first('pro_content')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Meta Title</label>
            <input type="text" name="pro_title_seo" id="" class="form-control" placeholder="Meta Title"
                   value="{{old('pro_title_seo',isset($product->pro_title_seo)?$product->pro_title_seo:'')}}">
        </div>
        <div class="form-group">
            <label for="name">Meta Description</label>
            <input type="text" name="pro_description_seo" id="" class="form-control" placeholder="Meta Description"
                   value="{{old('pro_description_seo',isset($product->pro_description_seo)?$product->pro_description_seo:'')}}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="name">Loại sản phẩm</label>
            <select name="pro_category_id" id="" class="form-control">
                <option value="">--Chọn--</option>
                @if(isset($categories))
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id)?$product->pro_category_id:'') == $category->id ? 'selected':''}}>{{$category->c_name}}</option>
                    @endforeach
                @endif
            </select>
            @if($errors->has('pro_category_id'))
                <div class="error-text">
                    {{$errors->first('pro_category_id')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Giá sản phẩm</label>
            <input type="text" name="pro_price" id="" class="form-control" placeholder="Giá sản phẩm"
                   value="{{old('pro_price',isset($product->pro_price)?$product->pro_price:'')}}">
            @if($errors->has('pro_price'))
                <div class="error-text">
                    {{$errors->first('pro_price')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Khuyến mãi (%) </label>
            <input type="text" name="pro_sale" id="" class="form-control" placeholder="00%"
                   value="{{old('pro_sale',isset($product->pro_sale)?$product->pro_sale:'')}}">
        </div>
        <div class="form-group ">
            <label class="custom-file-upload">
                <input type="file" name="avatar" id="in_img"/>
                Chọn ảnh
            </label>
        </div>
        <div class="form-group ">
            <img style="width: 100%;height: 300px"
                 src="{{isset($product->pro_avatar)?pare_url_file($product->pro_avatar):''}}" alt="" id="out_img">
        </div>

    </div>
    <div class="col-sm-7">

    </div>
</form>
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('pro_content');
    </script>
@endsection

