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
					<th>Tên khách hàng</th>
					<th>Địa chỉ</th>
					<th>Số điện thoại</th>
					<th>Ngày đặt hàng</th>
					<th>Tổng tiền</th>
					<th>Ghi chú</th>
				</tr>

				@foreach($orderlist1 as $items)
				<tr>
					<td>{{$items->idbills}}</td>
					<td>{{$items->name}}</td>
					<td>{{$items->address}}</td>
					<td>{{$items->phone_number}}</td>
					<td>{{$items->date_order}}</td>
					<td><strong>{{$items->total}}</strong></td>  
					<td>{{$items->note}}</td>
				</tr>
				@endforeach

			</table>
			<table class="table table-striped table-bordered table-hover  ">
				<tr>
					<th>Tên Sản Phẩm</th>
					<th>Ảnh</th>
					<th>Số Lượng</th>
					<th>Giá</th>
				</tr>

				@foreach($orderlist2 as $sp)
				<tr>
					<td>{{$sp->prod_name}}</td>
					<td><img height="100px" src="{{asset('anh/'.$sp->prod_img)}}"></td>
					<td>{{$sp->quantity}}</td>
					<td>{{$sp->unit_price}}</td>
				</tr>
				@endforeach

			</table>
		</div>
	</div>

</body>
</html>
