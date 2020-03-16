<form action="" method="POST">
    @csrf
    <div class="col-sm-12 ">
        <div class="form-group">
            <label for="name">Tên bài viết</label>
            <input type="text" class="form-control" placeholder="Nhập tên bài viết"
                   value="{{old('a_name',isset($article->a_name)?$article->a_name:'')}}" name="a_name">
            @if($errors->has('a_name'))
                <div class="error-text">
                    {{$errors->first('a_name')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Mô tả </label>
            <textarea class="form-control" id="" cols="30" rows="3"  name="a_description" placeholder="Nhập mô tả">{{old('a_description',isset($article->a_description)?$article->a_description:'')}}</textarea>
            @if($errors->has('a_description'))
                <div class="error-text">
                    {{$errors->first('a_description')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Nội dung</label>
            <textarea class="form-control" name="a_content" id="" cols="30" rows="3" placeholder="Nhập nội dung">{{old('a_content',isset($article->a_content)?$article->a_content:'')}}</textarea>
            @if($errors->has('a_content'))
                <div class="error-text">
                    {{$errors->first('a_content')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="name">Meta Title</label>
            <input type="text" name="a_title_seo" id="" class="form-control" placeholder="Meta Title"
                   value="{{old('a_title_seo',isset($article->a_title_seo)?$article->a_title_seo:'')}}">
        </div>
        <div class="form-group">
            <label for="name">Meta Description</label>
            <input type="text" name="a_description_seo" id="" class="form-control" placeholder="Meta Description"
                   value="{{old('a_description_seo',isset($article->a_description_seo)?$article->a_description_seo:'')}}">
        </div>
        <div class="form-group">
            <label for="name"> Avatar</label>
            <input type="file" name="a_avatar" id="">
        </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
    </div>
    </div>
</form>


