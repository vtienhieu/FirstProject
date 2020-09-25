@extends('master')
@section('content')

<script type="text/javascript">
  function updateCart(qty , rowId){
    $.get(
     '{{asset('cart/update')}}',
     {qty:qty,rowId:rowId},
     function(){
      location.reload();
    }

    );
  }
</script>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
 <div class="container h-100">
  <div class="row h-100 align-items-center">
   <div class="col-12">
    <div class="page-title text-center">
     <h2>Giỏ Hàng</h2>
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
      <div class="order-details-confirmation">
        <div class="wrap-table-shopping-cart bgwhite">
          <table class="table-shopping-cart"> 
            @if(Session::has('thongbao'))
            <div class="alert alert-success">
             <strong>{{Session::get('thongbao')}}</strong>
           </div> <!-- show thông báo đặt hàng thành công -->
           @endif 
           <tr class="table-head">
            <th class="column-1"></th>
            <th class="column-2">Tên Sản Phẩm</th>
            <th class="column-3" style="padding-left: 10px">Giá</th>
            <th class="column-4 p-l-70">Số Lượng</th>
<!--               <th class="column-5">Tổng Tiền</th>
-->            </tr>
@foreach($items as $item)
<tr class="table-row">
  <td class="column-1">
    <div class="cart-img-product b-rad-4 o-f-hidden">
      <img style="height: 88px; border-radius: 20px" 

      src="{{asset('anh/'.$item->options->img)}}" alt="IMG-PRODUCT">
    </div>
  </td>
  <td class="column-2">{{$item->name}}</td>
  <td class="column-3" style="padding-left: 10px">{{$item->price}}</td>
  <td class="column-4">
    <div class="flex-w bo5 of-hidden w-size17">
                  <!-- <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                  </button> -->

                  <input style="margin: 20px; width: 50px" class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{$item->qty}}" onchange="updateCart(this.value,'{{$item->rowId}}')">

                  <!-- <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                  </button> -->
                </div>
              </td>
              <!-- <td class="column-5">{{$total}}</td> -->
              <td class="column-6" style="padding-left: 30px" ><a href="{{asset('cart/delete/'.$item->rowId)}}">xóa</a></td>
            </tr>  
              @endforeach       
          </table>
          <hr>
          <h5>Tổng : {{$total}}</h5>
        </div>
      </div>

    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
    <div class="order-details-confirmation">

     <div class="cart-page-heading">
      <h5>Hóa Đơn Của Bạn</h5>
      <p>Chi Tiết Hóa Đơn</p>
    </div>

    <ul class="order-details-form mb-4">
      <li><span>Sản Phẩm</span> <span>Thành Tiền</span></li>
      <li><span>Tiền Hàng</span> <span>{{$total}}</span></li>
<!--     <li><span>Subtotal</span> <span>$59.90</span></li>
-->    <li><span>Phí Vận Chuyển</span> <span>30000</span></li>
<li><span>Tổng</span> <span>{{$total}}+30000</span></li>
</ul>
@if(Cart::count()>=1)
<div class="cart-page-heading mb-30">
  <h5 >Địa Chỉ Nhận Hàng</h5>
</div>

<form action="#" method="post">
  @include('errors.note')

  @csrf
  <div class="row">
   <div class="col-12 mb-3">
    <label for="first_name">Tên:<span>*</span></label>
    <input type="text" class="form-control" id="customerName" name="customerName" value="" required>
  </div>
  <div class="col-12 mb-3">
    <label for="street_address">Địa Chỉ: <span>*</span></label>
    <input type="text" class="form-control mb-3" id="street_address" name="customerAddress" value="" required>
  </div>
  <div class="col-12 mb-3">
    <label for="phone_number">Số Điện Thoại:<span>*</span></label>
    <input type="text" class="form-control" id="phone_number" name="customerPhone" value="" required>
  </div>
  <div class="col-12 mb-4">
    <label for="email_address">Email:</label>
    <input type="email" class="form-control" id="email_address" name="customerEmail" value="">
  </div>
  <div class="col-12 mb-3">
    <label for="street_address">Ghi chú:</label>
    <input type="text" class="form-control mb-3" id="street_address" name="customerNote" value="">
  </div>


  <div class="col-12">
   <div class="custom-control custom-checkbox d-block">
     <input type="checkbox" class="custom-control-input" id="customCheck3" checked>
     <label class="custom-control-label" for="customCheck3">Thanh toán khi nhận hàng:</label>
     <input style="margin-top: 30px; margin-left: 60px" type="submit" name="submit" value="Đặt Hàng" class="btn essence-btn">
   </div>
 </div>
</div>
</form>
@else
<h5 >Chưa Có Sản Phẩm Trong Giỏ Hàng</h5>
@endif
</div>
</div>
</div>
</div>
</div>
<!-- ##### Checkout Area End ##### -->

@endsection