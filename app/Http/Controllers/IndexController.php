<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Category;
use Illuminate\Pagination\Paginator;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Order;
use App\Contact;

class IndexController extends Controller
{
	public function __construct()
	{
		if (Auth::check()) {
			view()->share('user', Auth::user());
		}

		$cate = Category::all();
		$randProducts = Product::all()->random()->take(10)->get();
		$bestSeller = Product::select('*')->orderBy('number_order','desc')->take(3)->get();
		$brand = Product::select('brand')->distinct()->get();

		view()->share('cate', $cate);
		view()->share('randProducts', $randProducts);
		view()->share('bestSeller', $bestSeller);
		view()->share('brand', $brand);

	}
	public function index()
	{
		$featureProducts = Product::select('*')->orderBy('view','DESC')->take(8)->get()->toArray();
		$latestProducts = Product::select('*')->orderBy('created_at','DESC')->take(8)->get()->toArray();
		
		return view('user.index',compact('featureProducts', 'latestProducts'));
		
	}
	public function getProductInCategory($cateId)
	{
		$product = Product::where('category_id','=',$cateId)->orderBy('created_at','desc')->paginate(6);

		return view('user.products', compact('product'));
	}
	public function getProductInBrand($brandname)
	{
		$product = Product::where('brand','=',$brandname)->orderBy('created_at','desc')->paginate(6);

		return view('user.products', compact('product'));
	}
	public function getProductDetail($id)
	{

		$product = Product::find($id);
		Product::where('id',$id)->increment('view');
		$relateProduct = Product::where('category_id','=',$product['category_id'])->orderBy('created_at','desc')->take(9)->get();
		return view('user.product_detail', compact('product','relateProduct'));
	}
	public function postProductDetail($id, Request $request)
	{
		
		$productBuy = Product::find($id);

		Cart::add(['id'=>$id, 'name'=>$productBuy['name'],'qty'=>$request['txtQuant'],'price'=>$productBuy['price'],'options'=>['image'=>$productBuy['image']]]);
		$productInCart = Cart::content();
		return redirect('cart');
	}
	public function getCart()
	{
		$randProducts = Product::all()->random()->take(10)->get();
		$brand = Product::select('brand')->distinct()->get();
		$productInCart = Cart::content();
		$total = Cart::total();
		$subtotal = Cart::subtotal();
		$tax = Cart::tax();
		return view('user.cart', compact('productInCart','total','subtotal','tax'));
	}

	public function deleteProductWithRowId($rowId)
	{
		Cart::remove($rowId);
		return redirect('cart');
	}
	public function updateCart($id, $qty)
	{
		$item = Cart::update($id, $qty);
		$price = (Cart::get($id)->price);
		$sum =  $price * $qty;
		(string)$sum;
		$subtotal = Cart::subtotal();
		$total = Cart::total();
		$data = ['sumPrice'=>$sum, 'subtotal'=>$subtotal, 'total'=>$total];
		return redirect('cart');
	}

	public function getLogin()
	{
		return view('user.login_register');
	}
	public function postLogin(Request $request)
	{
		$this->validate($request,
			[
				'txtEmail'=>'required',
				'txtPass'=>'required',
			],[
				'txtEmail.required'=>'Email not empty !',
				'txtPass.required'=>'Password not empty !',
			]);
		if (Auth::attempt(['email'=>$request['txtEmail'],'password'=>$request['txtPass']])) {
			return redirect('index');
		} else {
			return redirect('login_register');
		}
	}
	public function getLogout()
	{
		Auth::logout();
		return redirect('index');
	}
	public function getCheckout()
	{

		return view('user.checkout');
	}
	public function postCheckout(Request $request)
	{
		if (Cart::count() > 0) {
			$this->validate($request,
				[
					'txtName' => 'required',
					'txtEmail' => 'required',
					'txtPhone' => 'required',
					'txtAddress' => 'required',
				],[
					'txtName.required' => 'Fullname not empty !',
					'txtEmail.required' => 'Email not empty !',
					'txtPhone.required' => 'Phone not empty',
					'txtAddress.required' => 'Address not empty',
				]);
			$transaction = new Transaction;
			$transaction['username'] = $request['txtName'];
			$transaction['email'] = $request['txtEmail'];
			$transaction['phone'] = $request['txtPhone'];
			$transaction['address'] = $request['txtAddress'];
			$transaction['status'] = 0;
			$transaction['username'] = $request['txtName'];
			$transaction['amount'] = Cart::total();
			$transaction['security'] = $request['_token'];
			if (Auth::check()) {
				$transaction['user_id'] = $request[Auth::id()];
			}
			$transaction->save();
			$itemInCart = Cart::content();
			foreach ($itemInCart as $item) {
				$order = new Order;
				$order->transaction_id = $transaction->id;
				$order->product_id = $item->id;
				$order->quantity = $item->qty;
				$order->size = 1;
				$order->color = 1;
				$order->amount = (int)$item->qty * (double)$item->price;
				$order->status = 0;
				$order->save();
			}
			Cart::destroy();
			return redirect('success');
		}
		

	}
	public function getSuccess()
	{
		return view('user.success');
	}

	public function getContact()
	{

		return view('user.contact');
	}
	public function postContact(Request $request)
	{
		$this->validate($request,
			[
				'txtName' => 'required',
				'txtEmail' => 'required',
				'txtPhone' => 'required',
				'txtMessage' => 'required',
			],[
				'txtName.required' => 'Name not empty !',
				'txtEmail.required' => 'Email not empty !',
				'txtPhone.required' => 'Phone not empty !',
				'txtMessage.required' => 'Message not empty !',
			]);
		$contact =  new Contact;
		$contact->name = $request->txtName;
		$contact->email = $request->txtEmail;
		$contact->phone = $request->txtPhone;
		$contact->message = $request->txtMessage;
		$contact->save();
		return redirect('contact');
	}
}
