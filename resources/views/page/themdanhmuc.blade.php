   @extends('master')
   @section('content')

   <div class="checkout_area section-padding-80">
    <div class="container">
      <div class="row">

        <div class="col-12 col-md-6">
          <div class="checkout_details_area mt-50 clearfix">

            <div class="cart-page-heading mb-30">
              <h5>Thêm Danh Mục</h5>
              <a href="{{asset('admin/them-san-pham')}}" class="btn btn-primary">Thêm Sản Phẩm</a>
              <a href="{{asset('admin/them-danh-muc')}}" class="btn btn-success">Quản Lí Danh Mục</a>
              <a href="{{asset('admin/quan-li-san-pham')}}" class="btn btn-danger">Quản Lí Sản Phẩm</a>
              <a href="{{asset('admin/quan-li-don-hang')}}" class="btn btn-info">Quản Lí Đơn Hàng</a>
              <a href="{{asset('admin/logout')}}" class="btn btn-warning">Đăng Xuất</a>
            </div>
            
            <form method="post">
              <div class="row">
                <div class="col-12 mb-3">
                  @if($errors->has('tendanhmuc'))
                  <div class="alert alert-danger">
                    {{$errors->first('tendanhmuc')}}
                  </div>
                  @endif

                  <label for="product_name">Tên Danh Mục <span>*</span></label>
                  <input type="text" class="form-control" id="first_name" value="" required name="tendanhmuc" >
                </div>
                <div class="col-12 mb-4">
                  <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
                </div>
              </div>
              {{csrf_field()}}
            </form>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
          <div class="order-details-confirmation">

            <div class="cart-page-heading">
              <h5>Danh Sách Danh Mục Sản Phẩm</h5>
              <!-- <p>The Details</p> -->
            </div>

            <ul class="order-details-form mb-4">
              @foreach($catelist as $cate)
              <li>{{$cate->cate_name}}</li>
              <a href="{{asset('sua-danh-muc/'.$cate->cate_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
              <a href="{{asset('xoa-danh-muc/'.$cate->cate_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
              @endforeach
            </ul>


          </div>
        </div>

        
      </div>
    </div>
  </div>
  @endsection