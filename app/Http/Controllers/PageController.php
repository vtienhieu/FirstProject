<?php

namespace App\Http\Controllers;
use App\Product;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use App\Http\Requests\LoginRequest;
//use Illuminate\Http\Request;
use App\ProducType;
use App\detailImage;
use Illuminate\Support\Str;
use DB,File,Cart,Auth;
use Request;





class PageController extends Controller
{
	public function getIndex(){
		$data['productlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
		$data['items'] = Cart::content();
		$data['total'] = Cart::total();
		return view('page.trangchu',$data);
	}

	public function getLoaiSp(){
		// $data['catelist'] = ProducType::all(); //đã được gọi trong AppServiceProvider tránh việc gọi nhiều lần trong nhiều controller
		// $data['product'] = Product::all(); //Như trên
		$data['items'] = Cart::content(); // Vì được gọi trong view master nên hàm nào cũng phải có.	
		$data['total'] = Cart::total();
		return view('page.loai_sanpham',$data);
	}

	public function getCategory($id){
		// $data['catelist'] = ProducType::all(); //đã được gọi trong AppServiceProvider tránh việc gọi nhiều lần trong nhiều controller
		$data['itemsp'] = Product::where('prod_cate',$id) ->orderBy('prod_id','desc')->paginate(8);
		$data['items'] = Cart::content();
		$data['total'] = Cart::total();

		return view('page.category',$data);

	}


	public function getChiTietSp($id){
		// $data = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->where('prod_id',$id)->orderBy('prod_id','desc')->get();
		// $detailImage = Product::find($id)->product_detailImage;
		// $data1['items'] = Cart::content();

		$data['cte'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->where('prod_id',$id)->orderBy('prod_id','desc')->get();
		$data['image'] = Product::find($id)->product_detailImage;
		$data['items'] = Cart::content();
		$data['total'] = Cart::total();

		return view('page.chitietsanpham',$data);
	}


	public function getThemSp(){
		$data['catelist'] = ProducType::all();
		$data['items'] = Cart::content();
		return view('page.themsanpham',$data);
	}

	public function postThemSp(AddProductRequest $request){
		$filename = $request->file('img')->getClientOriginalName();
		$product = new Product;
		$product ->prod_name = $request ->name;
		$product ->prod_slug = Str::slug($request ->name);
		$product ->prod_price = $request ->price;
		$product ->prod_promotionprice = $request ->promotionprice;
		$product ->prod_description = $request ->description;
		$product ->prod_status = $request ->featured;
		$product ->prod_banchay = $request ->banchay;
		$product ->prod_cate = $request ->cate;
		$product ->prod_img = $filename;
		$request->file('img')->move('anh/',$filename);
		$product->save();
		$product_id = $product ->prod_id;
		if($request->file('fProductDetail')){
			foreach ($request->file('fProductDetail') as $file) {
				$product_img = new detailImage();
				if(isset($file)){
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $product_id;
					$file->move('anh/anhChiTiet',$file->getClientOriginalName());
					$product_img->save();
				}
			}
		}

		return redirect()->intended('admin/quan-li-san-pham');
	}

	public function getThemDanhMuc(){
		$data['catelist'] = ProducType::all();
		$data['items'] = Cart::content();
		return view('page.themdanhmuc',$data);
	}

	public function postThemDanhMuc(AddCateRequest $request){
		$category  = new ProducType;
		$category ->cate_name = $request ->tendanhmuc;
		$category ->cate_slug = Str::slug($request ->tendanhmuc);
		$category ->save();
		return back();
	}

	public function getSuaDanhMuc($id){
		$data['ct'] = ProducType::find($id);
		$data['items'] = Cart::content();
		return view('page.suadanhmuc',$data);
	}

	public function postSuaDanhMuc(EditCateRequest $request,$id){
		$category = ProducType::find($id);
		$category ->cate_name = $request ->tendanhmuc;
		$category ->cate_slug = Str::slug($request ->tendanhmuc);
		$category ->save();
		return redirect()->intended('them-danh-muc');
	}

	public function getXoaDanhMuc($id){
		ProducType::destroy($id);
		return back();
	}

	public function getXoaSanPham($id){
		$detailImage = Product::find($id)->product_detailImage;
		foreach ($detailImage as $value) {
			File::delete('anh/anhChiTiet/'.$value['image']);
		}
		$product = Product::find($id);
		File::delete('anh/'.$product ->prod_img);
		
		$product->delete($id);
		return redirect()->intended('admin/quan-li-san-pham');
	}

	public function getQuanLiSanPham(){
		$data['prodlist'] = DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();

		return view('page.quanlisanphap',$data);
	}

	public function getQuanLiDonHang(){
		$data['orderlist'] = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->orderBy('id_customer','asc')->get(); // lấy ra thông tin hóa đơn và khách hàng
		return view('page.quanlidonhang',$data);


	}

	public function getChiTietDonHang($id){
		$data['orderlist1'] = DB::table('bills')->join('customer','bills.id_customer','=','customer.id')->where('bills.idbills','=',$id)->orderBy('id_customer','asc')->get(); // lấy ra thông tin hóa đơn và khách hàng theo id

		$data['orderlist2'] = DB::table('bills')->join('bill_detail','bills.idbills','=','bill_detail.id_bill')->join('vp_products','bill_detail.id_product','=','vp_products.prod_id')->where('bills.idbills','=',$id)->orderBy('id_customer','asc')->get(); // lấy ra chi tiết hóa đơn theo id
		return view('page.chitietdonhang',$data);
	}


	public function getSuaSanPham($id){
		$product = Product::find($id);
		$image = Product::find($id)->product_detailImage;

		return view('page.suasanpham',compact('product','image'));
	}

	public function postSuaSanPham(AddProductRequest $request,$id){
		$product = Product::find($id);
		$product ->prod_name = $request ->name;
		$product ->prod_slug = Str::slug($request ->name);
		$product ->prod_price = $request ->price;
		$product ->prod_promotionprice = $request ->promotionprice;
		$product ->prod_description = $request ->description;
		$product ->prod_status = $request ->featured;
		$product ->prod_banchay = $request ->banchay;
		$product ->prod_cate = $request ->cate;
		$img_current = 'anh/'.$request->img_current; // lấy đường dẫn ảnh cũ bên views
		if(!empty($request->file('img'))){
			if(File::exists($img_current)){
				File::delete($img_current); // xóa ảnh cũ 
			} // cho lên trên thì xóa file trước khi thêm ảnh mới vì để bên dưới nếu trùng tên ảnh cũ sẽ xóa luôn dẫn đến sp không có ảnh
			$file_name = $request->file('img')->getClientOriginalName();
			$product->prod_img = $file_name; //set tên ảnh trong database
			$request->file('img')->move('anh/',$file_name); //chuyển ảnh vào thư mục anh
		}else {
			echo"Không có file";
		}
		$product->save();

		if(!empty($request->file('fProductDetail'))){
			foreach ($request->file('fProductDetail') as $file) {
				$product_img = new detailImage();
				if(isset($file)){
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $id;
					$file->move('anh/anhChiTiet',$file->getClientOriginalName());
					$product_img->save();
				}
			}
		}

		return redirect()->intended('admin/quan-li-san-pham');
	}


	public function getdelimg($id){
		if (Request::ajax()) {
			$idHinh = (int)Request::get('idHinh');
			$image_detail = detailImage::find($idHinh);
			if(!empty($image_detail)){
				$img = 'anh/anhChiTiet/'.$image_detail->image;
				if(File::exists($img)) {
					File::delete($img);
				}
				$image_detail->delete();
			}
			return "Done";
		}
	}




	public function getLogin(){
		return view('page.login');
	}

	public function logout(){

		Auth::logout();
		return redirect()->intended('store/index');
	}

	public function postLogin(LoginRequest $request){
		$login = [
			'email' => $request->uname,
			'password' => $request->psw,
		];
		if(Auth::attempt($login)){
			return redirect()->intended('admin/quan-li-san-pham');
		}else{
			return redirect()->intended('login');
		}
	}















}
