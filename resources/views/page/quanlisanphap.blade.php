<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container">
    <h2>Table</h2>
    <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>
    <a href="{{asset('admin/them-san-pham')}}" class="btn btn-primary">Thêm Sản Phẩm</a>
    <a href="{{asset('admin/them-danh-muc')}}" class="btn btn-success">Quản Lí Danh Mục</a>
    <a href="{{asset('admin/quan-li-san-pham')}}" class="btn btn-danger">Quản Lí Sản Phẩm</a>
    <a href="{{asset('admin/quan-li-don-hang')}}" class="btn btn-info">Quản Lí Đơn Hàng</a>
    <a href="{{asset('admin/logout')}}" class="btn btn-warning">Đăng Xuất</a>                                                                                      
    <div class="table-responsive">          
      <table class="table table-striped table-bordered table-hover  ">
        <tr>
          <th>ID</th>
          <th>Ảnh</th>
          <th>Tên Sản Phẩm</th>
          <th>Danh Mục</th>
          <th>Giá</th>
          <th>Giá Khuyến Mãi</th>
          <th>Sản Phẩm Mới</th>
          <th>Sản Bán Chạy</th>
          <th></th>
        </tr>


        @foreach($prodlist as $items)
        <tr>
          <td>{{$items->prod_id}}</td>
          <td><a href="{{asset('chi-tiet-san-pham/'.$items->prod_id)}}"><img height="100px" src="{{asset('anh/'.$items->prod_img)}}"></a></td>
          <td>{{$items->prod_name}}</td>
          <td>{{$items->cate_name}}</td>
          <td>{{$items->prod_price}}</td>
          <td>{{$items->prod_promotionprice}}</td>
          @if($items->prod_status == 1){
          <td>Có</td>
        }@else{
        <td>Không</td>
      }@endif

      @if($items->prod_banchay == 1){
      <td>Có</td>
    }@else{
    <td>Không</td>
  }@endif
  <th>
    <a href="{{asset('admin/sua-san-pham/'.$items->prod_id)}}" class="btn btn-primary">Sửa</a>
    <a href="{{asset('admin/xoa-san-pham/'.$items->prod_id)}}" class="btn btn-success">Xóa</a>

  </th>
</tr>
@endforeach

</table>
</div>
</div>

</body>
</html>
