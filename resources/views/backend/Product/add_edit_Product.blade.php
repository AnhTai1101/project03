@extends('backend.master')
@section('title','Thêm sản phẩm')
@section('main')
    <div class="container">
        <form class="info-product" action="index.php?area=backend&controller=product&action=go_add" method="POST" enctype="multipart/form-data">
            @csrf
            {{--  <div class="form-group">
                <label for="id">ID sản phẩm</label>
                <input type="number" class="form-control" id="">
            </div>  --}}
            <div class="form-group">
                <label for="title">Tên sản phẩm</label>
                <input type="text" class="form-control" id="title" name="name" value="{{ isset($product->name) ? $product->name : '' }}" >
            </div>
            <div class="form-group">
                <label for="price">Giá sản phẩm:</label>
                <input name="price_unit" value="{{ isset($product->price_unit) ? $product->price_unit : '' }}" type="number"> .đ
            </div>
            <div class="form-group">
                <label for="price">Giá khuyến mại:</label>
                <input name="price_unit" value="{{ isset($product->price_promotion) ? $product->price_promotion : '' }}" type="number"> .đ
            </div>
            <div class="form-group">
                <label for="content">Thông tin giới thiệu</label>
                <input type="text" class="form-control" id="content" name="content" value="{{ isset($product->title) ? $product->title : '' }}">
            </div>
            <div class="form-group">
                <label for="status">Số lượng:</label>
                <input type="number" id="status" name="quantity" value="{{ $product->Quantity }}">
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
                <label for="category">Danh mục sản phẩm:</label>
                <select name="category_id" id="category">
                    <option value="{{ $product->type->id }}">{{ $product->type->name }}</option>
                    @foreach ($type as $type)
                        @if ($product->type->id != $type->id)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category">Danh mục thể loại:</label>
                <select name="category_id"infoid="category">
                    <option value="{{ $product->info->id }}">{{ $product->info->name }}</option>
                    @foreach ($info as $info)
                        @if ($product->info->id != $info->id)
                            <option value="{{ $info->id }}">{{ $info->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category">Size:</label>
                <select name="category_id" id="category">
                    <option value="{{ $product->size->id }}">{{ $product->size->name }}</option>
                    @foreach ($size as $size)
                        @if ($product->size->id != $size->id)
                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label for="category">Color:</label>
                <select name="category_id" id="category">
                    <option value="{{ $product->color->id }}">{{ $product->color->name }}</option>
                    @foreach ($color as $color)
                        @if ($product->color->id != $color->id)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Chi tiết sản phẩm:</label>
                <textarea name="description"  cols="60" rows="10"></textarea>
                {{--  <input type="text" class="form-control" id="description" name="description">  --}}
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh chính</div>
                <div class="avatar-wrap col-md-2">
                    <img src="public\images\{{ $product->image1 }}" alt="Ảnh chính">
                </div>
                <div class="col-md-10">
                    <input type="file" name="image">
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh phụ 1:</div>
                <div class="avatar-wrap col-md-2">
                    <img src="public\images\{{ $product->image2 }}" alt="Ảnh phụ 1">
                </div>
                <div class="col-md-10">
                    <input type="file" name="image1">
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Ảnh phụ 2</div>
                <div class="avatar-wrap col-md-2">
                    <img src="public\images\{{ $product->image3 }}" alt="Ảnh phụ 2">
                </div>
                <div class="avatar-wrap col-md-0">
                    <!-- <img src="" alt="Ảnh phụ 2"> -->
                </div>
                <div class="col-md-10">
                    <input type="file" name="image2">
                </div>
            </div>
            <!-- <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div> -->
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
@endsection