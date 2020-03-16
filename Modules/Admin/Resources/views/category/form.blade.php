<form action="" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Nhập tên danh mục" value="{{old('name',isset($category->c_name)?$category->c_name:'')}}" name="name">
        @if($errors->has('name'))
            <div class="error-text">
                {{$errors->first('name')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Icon</label>
        <input type="text" class="form-control" placeholder="fa fa-home" value="{{old('icon',isset($category->c_icon)?$category->c_icon:'')}}" name="icon">
        @if($errors->has('icon'))
            <div class="error-text">
                {{$errors->first('icon')}}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="name">Meta title</label>
        <input type="text" class="form-control" placeholder="Nhập Meta title" value="{{old('c_title_seo',isset($category->c_title_seo)?$category->c_title_seo:'')}}" name="c_title_seo">
    </div>
    <div class="form-group">
        <label for="name">Meta description</label>
        <input type="text" class="form-control" placeholder="Nhập Meta description" value="{{old('c_description_seo',isset($category->c_description_seo)?$category->c_description_seo:'')}}" name="c_description_seo">
    </div>
    <div class="form-group">
        <label for="name">Meta keyword</label>
        <input type="text" class="form-control" placeholder="Nhập Meta keyword" value="{{old('c_keyword_seo',isset($category->c_keyword_seo)?$category->c_keyword_seo:'')}}" name="c_keyword_seo">
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label > <input name="hot" type="checkbox">Nổi bật</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>
