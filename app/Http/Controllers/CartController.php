<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;

use Cart;
use App\Product;
use App\Customer;
use App\Bill;
use App\BillDetail;

class CartController extends Controller
{
	public function getAddCart($id){
		$product = Product::find($id);
		Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_promotionprice, 'weight' => 1000, 'options' => ['img' => $product->prod_img]]);
		return back();
	}


	public function getShowCart(){
		$data['total'] = Cart::total();
		$data['items'] = Cart::content();
		return view('page.giohang',$data);
	}

	public function postShowCart(StoreCartRequest $request){
		$customer = new Customer;
		$customer->name = $request->customerName;
		$customer->address = $request->customerAddress;
		$customer->phone_number = $request->customerPhone;
		$customer->email = $request->customerEmail;
		$customer->note = $request->customerNote;
		$customer->save();

		$bill = new Bill;
		$bill->id_customer = $customer->id;
		$bill->date_order = date('Y-m-d');
		$bill->total = Cart::total(null,null,'');
		$bill->note = $request->customerNote;
		$bill->save();

		$data = Cart::content();

		foreach ($data as $key => $value) {
			$bill_detail = new BillDetail;
			$bill_detail->id_bill = $bill->id;
			$bill_detail->id_product = $value->id;
			$bill_detail->quantity = $value->qty;
			$bill_detail->unit_price = $value->price;
			$bill_detail->save();
		}

		Cart::destroy();
		return redirect()->back()->with('thongbao','Đặt hàng thành công!');
	}

	public function getDeleteCart($id){
		Cart::remove($id);
		return back();
	}

	public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
	}
}
