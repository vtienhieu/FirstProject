@extends('masterid')
@section('contentid')
<div class="cart-bg-overlay"></div>

<div class="right-side-cart-area">

  <!-- Cart Button -->
  <div class="cart-button">
    <a href="#" id="rightSideCart"><img src="../img/core-img/bag.svg" alt=""> <span>{{Cart::count()}}</span></a>
  </div>

  <div class="cart-content d-flex">

    <!-- Cart List Area -->
    <div class="cart-list">
      <!-- Single Cart Item -->
      @foreach($items as $item)
      <!-- Single Cart Item -->
      <div class="single-cart-item">
        <a href="{{asset('cart/show')}}" class="product-image">
          <img src="{{asset('anh/'.$item->options->img)}}" class="cart-thumb" alt="">
          <!-- Cart Item Desc -->
          <div class="cart-item-desc">
            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
            <span class="badge">Sản Phẩm</span>
            <h6>{{$item->name}}</h6>
            <!-- <p class="size">Size: S</p>
              <p class="color">Color: Red</p> -->
              <p class="price">{{$item->price}}</p>
            </div>
          </a>
        </div>
        @endforeach
      </div>

      <!-- Cart Summary -->
      <div class="cart-amount-summary">

        <h2>Summary</h2>
        <ul class="summary-table">
          <li><span>subtotal:</span> <span>$274.00</span></li>
          <li><span>delivery:</span> <span>Free</span></li>
          <li><span>discount:</span> <span>-15%</span></li>
          <li><span>total:</span> <span>$232.00</span></li>
        </ul>
        <div class="checkout-btn mt-100">
          <a href="checkout.html" class="btn essence-btn">check out</a>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Right Side Cart End ##### -->

  <div class="checkout_area section-padding-80">
    <div class="container">
     <div class="row">

      <div class="col-12 col-md-6">
       <div class="checkout_details_area mt-50 clearfix">

        <div class="cart-page-heading mb-30">
          <h5>Sửa Danh Mục</h5>
       </div>
       @include('errors.note')
       <form method="post">
         <div class="row">
          <div class="col-12 mb-3">
           <label for="product_name">Tên Danh Mục <span>*</span></label>
           <input type="text" class="form-control" id="tendanhmuc" value="{{$ct->cate_name}}" required name="tendanhmuc" >
         </div>
         <div class="col-12 mb-4">
           <input type="submit" name="submit" value="Sửa" class="btn btn-primary">
         </div>
       </div>
       {{csrf_field()}}
     </form>
   </div>
 </div>




</div>
</div>
</div>
@endsection