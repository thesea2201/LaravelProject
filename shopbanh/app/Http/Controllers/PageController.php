<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;

use Auth;
use Hash;
use Session;

class PageController extends Controller
{
    public function getIndex(){
    	// return view('page/index');
        $slides = Slide::all();
        $newProducts = (new Product)-> getNewProduct()->paginate(8,['*'],'new-product');
        $promoProducts = (new Product)->getSaleProduct()->paginate(8,['*'],'sale-product');

        return view('page/index',[
            'slides'=>$slides,
            'newProducts'=>$newProducts,
            'promoProducts'=>$promoProducts,
        ]);
    }
    
    public function getProductType($productType){
        $productByTypes = Product::where('id_type', (string)$productType)->get();
        if ($productByTypes->isEmpty()) {
            return view('page/404');
        }
    	return view('page/product_type',[
            'productByTypes'=>$productByTypes,
        ]);
    }

    public function getProduct($productId){
        $product = (new Product)->getProductById($productId);
    	if (empty($product)) {
            return view('page/404');
        }

        $relatedProducts = (new Product)->getRelatedProduct($product)->paginate(3);

        return view('page/product',[
            'product'=>$product,
            'relatedProducts'=>$relatedProducts
        ]);
    }

    public function get404(){
    	return view('page/404');
    }

	public function getAbout(){
    	return view('page/about');
    }

	public function getContact(){
    	return view('page/contact');
    }

    public function getAddToCart($id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $reg = session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDeleteToCart($id){
        $oldCart = Session::get('cart')?Session('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if($cart->totalQty > 0){
            Session::put('cart',$cart);    
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getCheckOut(){
        if (Session::has('cart')) {              
            $oldCart = Session('cart'); 
            $cart = new Cart($oldCart);
            return view('page.check_out', ['cart'=>Session::get('cart'),'productCart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
        }
        return view('page.check_out');
    }

    public function postCheckOut(Request $req){
        if(Session::has('cart')){
            $cart = Session::get('cart');

            $customer = new Customer();
            $customer->name = $req->name;
            $customer->gender = $req->gender;
            $customer->email = $req->email;
            $customer->address = $req->address;
            $customer->phone_number = $req->phone;
            $customer->note = $req->notes;
            $customer->save();
            
            $bill = new Bill();
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d G:i:s');
            $bill->total = $cart->totalPrice;
            $bill->payment = $req->payment_method;
            $bill->note = $req->notes;
            $bill->save();

            foreach ($cart->items as $key => $value) {            
                $billDetail = new BillDetail();
                $billDetail->id_bill = $bill->id;
                $billDetail->id_product = $key;
                $billDetail->quantity = $value['qty'];
                $billDetail->unit_price = $value['price']/$value['qty'];
                $billDetail->created_at = date('Y-m-d G:i:s');
                $billDetail->save();
            }
            Session::forget('cart');
            return redirect()->back()->with('alert', 'Đặt hàng thành công');
        }
        return redirect()->back();
    }

    public function getSignup(){
        return view('page.signup');
    }

    public function getLogin(){
        return view('page.login');
    }

    public function postSignup(Request $req){
        $this->validate($req,
            [
            'email'=>'required|email|unique:users,email',
            'name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
            'password'=>'required|min:4|max:20',
            'rePassword'=>'required|same:password'
        ],
        [
            'email.required'=>"Vui lòng nhập email",
            'email.email'=>'Email không đúng địng dạng',
            'email.unique'=>'Email đã tồn tại',
            'address.required'=>'Vui lòng nhập địa chỉ người dùng',
            'phone_number.required'=>'Vui lòng nhập số điện thoại',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>"Password phải nhiều hơn 3 ký tự",
            'rePassword.same'=>"Mật khẩu không trùng khớp"            
        ]
        );

        $user = new User();
        $user->email = $req->email;
        $user->full_name = $req->name;
        $user->address = $req->address;
        $user->phone = $req->phone_number;
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect()->back()->with('success_alert','Đăng ký thành công');
    }

    public function postLogin(Request $req){
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:4|max:20'
        ]
        ,[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Vui lòng nhập đúng định dạng email',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Mật khẩu tối thiểu 4 ký tự'
        ]);
        $credentials = array('email' => $req->email, 'password' => $req->password );
        if (Auth::attempt($credentials)) {
            return redirect()->back()->with('success_alert', 'Đăng nhập thành công!');
        }
        return redirect()->back()->with('fail_alert', 'Email hoặc mật khẩu không chính xác!');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
