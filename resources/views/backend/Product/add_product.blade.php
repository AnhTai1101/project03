@extends('backend.master')
@section('title','Thêm sản phẩm')
@section('main')
    
    <div class="container">
        <form class="info-product" method="POST" enctype="multipart/form-data">
            @csrf
            {{--  <div class="form-group">
                <label for="id">ID sản phẩm</label>
                <input type="number" class="form-control" id="">
            </div>  --}}
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" >
                @if ($errors->has('name'))
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input name="price_unit" type="number"> .đ
                @if ($errors->has('price_unit'))
                    <div class="alert alert-danger">{{ $errors->first('price_unit') }}</div>
                @endif
            </div>
            
            <div class="form-group">
                <label for="price_promotion">Giá khuyến mại:</label>
                <input value="0" id="price_promotion" name="price_promotion" type="number"> .đ
            </div>
            <div class="form-group">
                <label for="content">Thông tin giới thiệu</label>
                <input type="text" class="form-control" id="content" name="content" >
                @if ($errors->has('content'))
                    <div class="alert alert-danger">{{ $errors->first('content') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" >
                @if ($errors->has('quantity'))
                    <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                @endif
            </div>
            <!-- <div class="form-group">
                <label for="category_id">Danh mục sản phẩm:</label>
                <input type="number" class="form-control" id="category_id" name="category_id">
            </div> -->
            {{--  <div class="form-group">
                <label for="news_id">Danh mục tin tức:</label>
                <input type="text" class="form-control" id="news_id" name="news_id">
            </div>  --}}
            <div>
                <label for="type">Danh mục sản phẩm:</label>
                <select name="type" id="type">
                    @foreach ($type as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="info">Danh mục thể loại:</label>
                <select name="info"infoid="info">
                    @foreach ($info as $info)
                        <option value="{{ $info->id }}">{{ $info->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="size">Size:</label>
                <select name="size" id="size">
                    @foreach ($size as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="Color">Color:</label>
                <select name="color" id="Color">
                    @foreach ($color as $color)
                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Chi tiết sản phẩm:</label>
                <textarea name="description"  cols="60" rows="10"></textarea>
                {{--  <input type="text" class="form-control" id="description" name="description">  --}}
                @if ($errors->has('description'))
                    <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh chính</div>
                <div class="avatar-wrap col-md-2">
                </div>
                <div class="col-md-10">
                    <input type="file" name="image1">
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh phụ 1:</div>
                <div class="avatar-wrap col-md-2">
                    <img src="" alt="Ảnh phụ 1">
                </div>
                <div class="col-md-10">
                    <input type="file" name="image2">
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh phụ 2</div>
                <div class="avatar-wrap col-md-2">
                    <img src="" alt="Ảnh phụ 2">
                </div>
                <div class="avatar-wrap col-md-0">
                    <!-- <img src="" alt="Ảnh phụ 2"> -->
                </div>
                <div class="col-md-10">
                    <input type="file" name="image3">
                </div>
            </div>
            <!-- <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div> -->
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection