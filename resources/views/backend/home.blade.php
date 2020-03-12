@extends('backend.master')
@section('title','Trang chủ')
@section('main')
    <h2>Chào mừng bạn đến với trang quản trị</h2>
    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price unit</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:8%">Quantity</th>
                    
                    <th style="width:10%"></th>
                </tr>
            </thead>
            @foreach ($products as $product)
                <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="public/images/{{ $product->image1 }}" alt="..." class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">{{ $product->name }}</h4>
                                    <p>{{ $product->discription }}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ number_format($product->price_unit) }} .đ</td>
                        <td data-th="Subtotal" class="text-center">{{ $product->price_promotion == 0 ? '0' : $product->price_promotion   }} .đ</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="{{ $total }}">
                        </td>
                        
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
                        </td>
                    </tr>
                </tbody>
            @endforeach
            
            {{--  <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total 1.99</strong></td>
                </tr>
                <tr>
                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                    <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>  --}}
        </table>
        {{ $products->links() }}
    </div>
@endsection