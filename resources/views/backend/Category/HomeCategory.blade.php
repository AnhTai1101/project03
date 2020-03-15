@extends('backend.master')
@section('title','Trang danh sach danh muc')
@section('main')
    {{-- <a href="{{ route('add-category') }}"><button style="margin: 10px;" class="btn badge-info">Thêm danh mục</button></a> --}}
    
    <div class="noti-wrap">
        <div class="noti__item js-item-menu">
            <button style="margin: 10px;" class="btn badge-info ">Thêm danh mục</button>
            {{-- <div class="mess-dropdown js-dropdown">
                <div class="mess__title">
                    <p>You have 2 news message</p>
                </div>
                <div class="mess__item">
                    <div class="image img-cir img-40">
                        <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                    </div>
                    <div class="content">
                        <h6>Michelle Moreno</h6>
                        <p>Have sent a photo</p>
                        <span class="time">3 min ago</span>
                    </div>
                </div>
                <div class="mess__item">
                    <div class="image img-cir img-40">
                        <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                    </div>
                    <div class="content">
                        <h6>Diane Myers</h6>
                        <p>You are now connected on message</p>
                        <span class="time">Yesterday</span>
                    </div>
                </div>
                <div class="mess__footer">
                    <a href="#">View all messages</a>
                </div>
            </div> --}}
            <div class="mess-dropdown js-dropdown">
                <div class="container">    
                    <div id="add-category" style="margin-top:10px;">                    
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Thêm </div>
                            </div>     
            
                            <div style="padding-top:0px" class="panel-body" >
            
                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                                    
                                <form method="POST" id="loginform" action="{{ route('add-category') }}" class="form-horizontal" role="form">
                                    @csrf
                                    <div style="margin-bottom: 20px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-text-width" aria-hidden="true"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="name" value="" placeholder="Tên danh mục">                                        
                                    </div>
                                        
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></span>
                                        <input id="login-password" type="text" class="form-control" name="title" placeholder="Chú thích">
                                    </div>
            
                                    <div class="input-group">
                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->
                                            <div class="col-sm-12 controls">
                                                <button class="btn btn-success">Tạo danh mục  </button>
                                            </div>
                                        </div>  
                                    </div>  
                                </form>
                            </div>                     
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Content</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
            <tr>
                <th scope="row">{{ $type->id }}</th>
                <td>{{ $type->name }}</td>
                <td>{{ $type->title }}</td>
                <td>
                    <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                    &nbsp;
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $types->links() }}
    
@endsection