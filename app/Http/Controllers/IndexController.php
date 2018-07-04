<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\Product;
use App\Category;
use Illuminate\Pagination\Paginator;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Transaction;
use App\Order;
use App\Contact;
use App\User;
use App\Size;
use App\Color;
use App\ProductSize;
use App\ProductColor;
use App\ProductDetail;
use Mail;

class IndexController extends Controller
{
	public function __construct()
	{
		if (Auth::check()) {
			view()->share('user', Auth::user());
		}
		
		$cate = Category::all();
		$sportCates = Category::where('parent_id','=',39)->orWhere('parent_id','=',40)->get();
		$accessoryCates = Category::where('parent_id','=',41)->orWhere('parent_id','=',42)->get();
		$randProducts = null;
		if (count(Product::all()) > 0) {
			$randProducts = Product::all()->random()->take(10)->get();
		}
		
		$bestSeller = Product::select('*')->orderBy('number_order','desc')->take(3)->get();
		$brand = Product::select('brand')->distinct()->get();

		view()->share('cate', $cate);
		view()->share('randProducts', $randProducts);
		view()->share('bestSeller', $bestSeller);
		view()->share('brand', $brand);
		view()->share('sportCates', $sportCates);
		view()->share('accessoryCates', $accessoryCates);
	}
	public function index(Request $request)
	{
		$featureProducts = Product::select('*')->orderBy('view','DESC')->take(8)->get()->toArray();
		$latestProducts = Product::select('*')->orderBy('created_at','DESC')->take(8)->get()->toArray();
		$email = $request->cookie('email');
		return view('user.index',compact('featureProducts', 'latestProducts', 'email'));
	}
	public function getProductSearch($txtSearch)
	{
		$products = Product::where('name','like',"%$txtSearch%")->orWhere('brand','like',"%$txtSearch%")->paginate(6);
		return view('user.products', compact('products'));
	}
	public function postProductSearch(Request $request)
	{
		if ($request->txtSearch != '') {
			$txtSearch = $request->txtSearch;
			
			return redirect('products/search/'.$txtSearch);
		} else {
			return redirect()->back();
		}
		

	}
	public function getProductWomen()
	{
		$products = Product::where('gender','=',0)->take(30)->paginate(6);
		
		return view('user.products', compact('products'));
	}
	public function getProductMen()
	{
		$products = Product::where('gender','=',1)->take(30)->paginate(6);
		return view('user.products', compact('products'));
	}
	public function getProductBestSeller()
	{
		$products = Product::select('*')->orderBy('view','esc')->take(50)->paginate(6);
		return view('user.products', compact('products'));
	}
	public function getProductInCategory($cateId)
	{
		$products = Product::where('category_id','=',$cateId)->orderBy('created_at','desc')->paginate(6);

		return view('user.products', compact('products'));
	}
	public function getProductInBrand($brandname)
	{
		$product = Product::where('brand','=',$brandname)->orderBy('created_at','desc')->paginate(6);

		return view('user.products', compact('product'));
	}
	public function getProductDetail($id)
	{
		$product = Product::findOrFail($id);
		$listProductDetail = ProductDetail::where('product_id',$id)->get();
		$listSize = Size::select('size.size', 'size.id')->distinct()->join('product_detail','product_detail.size_id','=','size.id')->join('color','color.id','=','product_detail.color_id')->where('product_detail.product_id',$id)->where('quantity','>',0)->get();
		$listColor = Color::select('color.name', 'color.id')->distinct()->join('product_detail','product_detail.color_id','=','color.id')->where('size_id','=',$listSize[0]->id)->where('product_detail.product_id',$id)->where('quantity','>',0)->get();
		
		Product::where('id',$id)->increment('view');
		$relateProduct = Product::where('category_id',$product['category_id'])->orderBy('created_at','desc')->take(9)->get();
		return view('user.product_detail', compact('product','relateProduct','listSize','listColor', 'listProductDetail'));
	}
	public function postProductDetail($id, Request $request)
	{
		$size = Size::findOrFail($request->slcSize);
		$color = Color::findOrFail($request->slcColor);
		$productDetail = ProductDetail::select('*')->where('product_id',$id)->where('color_id',$request->slcColor)->where('size_id',$request->slcSize)->get()->first();
		$productBuy = Product::findOrFail($id);
		Cart::add(['id'=>$productDetail['id'], 'name'=>$productBuy['name'],'qty'=>$request['txtQuant'],'price'=>$productBuy['price'],'options'=>['image'=>$productBuy['image'], 'size' => $request->slcSize, 'color' => $request->slcColor]]);
		$productInCart = Cart::content();
		return redirect('cart');
	}
	public function updateProductDetail($id)
	{
		$qty = $_GET['qty'];
		$sizeId = $_GET['sizeId'];
		$colorId = $_GET['colorId'];
		$productDetail = ProductDetail::select('*')->where('product_id',$id)->where('size_id',$sizeId)->where('color_id',$colorId)->get()->first();
		if ($productDetail->quantity < $qty) {
			$maxQty = $productDetail->quantity;
			$error = "Quantity not enough, only ". $maxQty ." items in store !";
			$data = ['status' => 'error','error' => $error, 'maxQty' => $maxQty];
			return $data;
		}
		
		

	}
	public function getCart()
	{
		$randProducts = null;
		if (count(Product::all())>0) {
			$randProducts = Product::all()->random()->take(10)->get();
		}
		$brand = Product::select('brand')->distinct()->get();
		$productInCart = Cart::content();
		$total = Cart::total();
		$subtotal = Cart::subtotal();
		$tax = Cart::tax();
		foreach ($productInCart as $item) {
			$detail = ProductDetail::findOrFail($item->id);
			$quantity = $detail->quantity;
			if ($item->qty > $quantity) {
				$error = 'quantity not enough';
				return view('user.cart', compact('productInCart','total','subtotal','tax','error'));
			}
		}
		return view('user.cart', compact('productInCart','total','subtotal','tax'));
	}

	public function deleteProductWithRowId($rowId)
	{
		Cart::remove($rowId);
		return redirect('cart');
	}
	public function updateCart($rowId, $qty)
	{
		$item = Cart::get($rowId);
		$id = $item->id;
		$product = ProductDetail::findOrFail($id);
		$maxQty = $product->quantity;
		if ($product->quantity >= $qty) {
			Cart::update($rowId, $qty);
			$price = (Cart::get($rowId)->price);
			$sum =  $price * $qty;
			(string)$sum;
			$subtotal = Cart::subtotal();
			$total = Cart::total();
			$data = ['status'=>'success','sumPrice'=>$sum, 'subtotal'=>$subtotal, 'total'=>$total];
			return $data;
		} else {
			$error = 'Quantity not enough, only '. $maxQty . ' items in store !';
			$data = ['status'=>'error','error'=>$error];
			return $data;
		}
		
	}


	public function getLogin(Request $request)
	{
		$emailCookie = $request->cookie('email');
		return view('user.login_register', compact('emailCookie'));
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
			if (!Cookie::has('email')) {
				$response = new Response; 
				//$response->withCookie('email', $request['txtEmail'], 1);
				return redirect('index')->withCookie('email', $request['txtEmail'], 1);
			}
		} else {
			return redirect('index');
		}
	}
	public function postRegister(Request $request)
	{
		$this->validate($request,
			[
				'txtUser'=>'required',
				'txtEmail'=>'required|unique:users,email',
				'txtFullName'=>'required',
				'txtPhone'=>'required',
				'txtAddress'=>'required',
				'txtRePass'=>'required|same:txtPass',

			],[
				'txtUser.required'=>'User not empty !',
				'txtEmail.required'=>'Email not empty !',
				'txtEmail.unique'=>'Email exist !',
				'txtFullName.required'=>'Fullname not empty !',
				'txtPhone.required'=>'Phone not empty !',
				'txtAddress.required'=>'Address not empty !',
				'txtPass.required'=>'Password not empty !',
				'txtRePass.same'=>'Password not same !',
			]);
		$user = new User;
		$user->username = $request->txtUser;
		$user->email = $request->txtEmail;
		$user->phone = $request->txtPhone;
		$user->address = $request->txtAddress;
		$user->password = $request->txtPass;
		$user->save();
		
		if (!Cookie::has('email')) {
			$response = new Response; 
			return redirect('index')->withCookie('email', $request['txtEmail'], 1);
			
		} else {
			return redirect('login');
		}
	}
	public function getLogout()
	{
		Auth::logout();
		return redirect('index');
	}
	public function getCheckout()
	{
		if (Cart::count() > 0) {
			return view('user.checkout');
		} else {
			$message = 'No product in cart';
			return redirect('cart');
		}
		
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
			$transaction['payment'] = 'Cash';
			$transaction['payment_info'] = '';
			$transaction['message'] = $request->txtMessage;
			$transaction['username'] = $request['txtName'];
			$transaction['amount'] = (double)(Cart::total());
			$transaction['security'] = $request['_token'];
			if (Auth::check()) {
				$transaction['user_id'] = $request[Auth::id()];
			}
			$transaction->save();
			$itemInCart = Cart::content();
			foreach ($itemInCart as $item) {
				ProductDetail::where('id',$item->id)->decrement('quantity',$item->qty);
				$prodDetail = ProductDetail::findOrFail($item->id);
				$order = new Order;
				$order->transaction_id = $transaction->id;
				$order->product_id = $prodDetail->product_id;
				$order->quantity = $item->qty;
				$order->size = $item->options->size;
				$order->color = $item->options->color;
				$order->amount = (int)$item->qty * (double)$item->price;
				$order->note = 'order';
				$order->save();
			}
			Cart::destroy();
			$data = ['name' => 'Info order','message' => 'Your buy products is success','email' => $transaction->email];
			// Mail::send('mail', $data, function ($msg) use ($transaction)
			// {
			// 	$msg->from('aloha4391@gmail.com', 'Info order');
			// 	$msg->to($transaction->email)->subject('Your order is success');
			// });
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
