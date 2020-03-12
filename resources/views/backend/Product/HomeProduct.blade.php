@extends('backend.master')
@section('title','Trang danh sach san pham')
@section('main')
&nbsp;&nbsp;&nbsp;<a href="{{ route('add-product') }}"><button class="btn btn-success">Thêm</button></a>
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Promotion</th>
                <th style="width:10%">Action</th>
            </tr>
        </thead>
        @foreach ($products as $product)
            <tbody>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="public\images\{{ $product->image1 }}" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">{{ $product->name }}</h4>
                                <p>{{ $product->type->name }}</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ number_format($product->price_unit) }}</td>
                    <td data-th="Quantity" class="text-center">
                        {{ $product->Quantity }}
                        {{-- <input type="number" class="form-control text-center" value="1"> --}}
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ number_format($product->price_promotion) }}</td>
                    <td class="actions" data-th="">
                        <a href="{{ route('edit-product') }}">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </a>
                        <a href="{{ route('delete-product',$product->id) }}">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>
                    </td>
                </tr>
            </tbody>
        @endforeach
        {{-- <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total 1.99</strong></td>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot> --}}
    </table>
</div>
@endsection