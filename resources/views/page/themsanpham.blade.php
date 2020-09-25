  @extends('master')
  @section('content')
  <!-- ##### Breadcumb Area Start ##### -->
  <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
  	<div class="container h-100">
  		<div class="row h-100 align-items-center">
  			<div class="col-12">
  				<div class="page-title text-center">
  					<h2>Thêm Sản Phẩm Mới</h2>
              <a href="{{asset('admin/them-san-pham')}}" class="btn btn-primary">Thêm Sản Phẩm</a>
    <a href="{{asset('admin/them-danh-muc')}}" class="btn btn-success">Quản Lí Danh Mục</a>
    <a href="{{asset('admin/quan-li-san-pham')}}" class="btn btn-danger">Quản Lí Sản Phẩm</a>
    <a href="{{asset('admin/quan-li-don-hang')}}" class="btn btn-info">Quản Lí Đơn Hàng</a>
    <a href="{{asset('admin/logout')}}" class="btn btn-warning">Đăng Xuất</a>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  <!-- ##### Breadcumb Area End ##### -->

  <!-- ##### Checkout Area Start ##### -->
  <div class="checkout_area section-padding-80">
  	<div class="container">
  		<div class="row">

  			<div class="col-12 col-md-6">
  				<div class="checkout_details_area mt-50 clearfix">

  					<div class="cart-page-heading mb-30">
  						<h5>Billing Address</h5>
  					</div>

  					<form method="post" enctype="multipart/form-data">
          @include('errors.note')
  						<div class="row">
  							<div class="col-md-6 mb-3">
  								<label for="product_name">Tên Sản Phẩm <span>*</span></label>
  								<input type="text" class="form-control" id="first_name" value="" required name="name" >
  							</div>
  							<div class="col-md-6 mb-3">
  								<label for="product_price">Giá <span>*</span></label>
  								<input type="text" class="form-control" id="last_name" value="" required name="price">
  							</div>
  							<div class="col-12 mb-3">
  								<label for="promotion_price">Giá Khuyến Mãi</label>
  								<input type="text" class="form-control" id="company" value="" name="promotionprice">
  							</div>
  							<div class="col-12 mb-3">
  								<label for="country">Danh mục sản phẩm<span>*</span></label>
  								<select class="w-100" id="country" name="cate">
                    @foreach($catelist as $cate)
                    <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <label for="description">Mô Tả Sản Phẩm <span>*</span></label>
                  <textarea type="text" class="ckeditor" id="street_address" value="" name="description"></textarea>
                  <script type="text/javascript">
                   var editor = CKEDITOR.replace('street_address',{
                    language:'vi',
                    filebrowserBrowseUrl: 'http://localhost:8080/webbanhang/public/ckfinder/ckfinder.html',

                    filebrowserImageBrowseUrl: 'http://localhost:8080/webbanhang/public/ckfinder/ckfinder.html?Type=Images',
                    filebrowserFlashBrowseUrl: 'http://localhost:8080/webbanhang/public/ckfinder/ckfinder.html?Type=Flash',
                    filebrowserImageUploadUrl: 'http://localhost:8080/webbanhang/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                    filebrowserFlashUploadUrl: 'http://localhost:8080/webbanhang/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                  });
                </script>

              </div>

              <div class="form-group" >
                <label>Ảnh sản phẩm</label>
                <input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                <img id="avatar" class="thumbnail" width="300px" src="../anh/upload-your-logo-here-21052-p-800x800.png">
              </div>



              <div class="col-12 mb-3">
                <label>Sản phẩm mới</label><br>
               <select required name="featured" class="form-control">
                    <option value="1" >Có:</option>
                    <option value="0"  >Không:</option>
                  </select>
              </div>
              <div class="col-12 mb-3">
                <label>Sản phẩm bán chạy</label><br>
               <select required name="banchay" class="form-control">
                    <option value="1" >Có:</option>
                    <option value="0"  >Không:</option>
                  </select>
              </div>
              @for ($i = 1 ; $i <=5 ; $i++)
              <div class="form-group" >
                <label>Ảnh Chi Tiết {{$i}}</label>
                <input id="img" type="file" name="fProductDetail[]" class="form-control hidden" >
              </div>
              @endfor
              <div class="col-12 mb-4">
                <input type="submit" name="submit" value="Thêm" class="btn btn-primary">
              </div>
              


            </div>
            {{csrf_field()}}
          </form>
        </div>
      </div>


    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection