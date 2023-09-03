<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Order;
use App\Http\Requests\Client\RegisterClientRequest;
use App\Http\Requests\Client\InforClientRequest;
use App\Http\Requests\Client\LoginClientRequest;
use App\Http\Requests\Order\OrderRequest;
use \Hash;
use \Auth;

class ClientController extends Controller
{
    public function getClientLogin(){
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.clientLogin', compact('brands'));
    }

    public function postLogin(LoginClientRequest $request){
        $client = Client::where('emailClient', '=', $request->emailClient)->first();
        if ($client != null) {
            if(Hash::check($request->passwordClient, $client->passwordClient)) {
                Auth::guard('client')->login($client);
                return redirect()->route('shop.index')->with('success','Đăng nhập thành công');
            }
            else{
                return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác!');
            }
        }
        else{
            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function getClientRegister(){
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.clientRegister', compact('brands'));
    }

    public function postClientRegister(RegisterClientRequest $request){
        $client = $request->only('nameClient', 'emailClient', 'telClient');
        $client['passwordClient']=Hash::make($request->passwordClient);
        Client::create($client);
        return redirect()->route('get.clientLogin')->with('success','Đăng kí thành công');
    }

    public function logout(){
        client()->logout();
        return redirect()->route('shop.index')->with('success','Đăng xuất thành công');
    }

    public function inforClient() {
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.inforClient', compact('brands'));
    }

    public function updateInforClient(InforClientRequest $request) {
        $data = $request->only('nameClient', 'telClient', 'addressClient');
        $data['updated_at'] = now();
        if(client()->user()->update($data)){
            return redirect()->route('client.infor')->with('success','Thay đổi thông tin thành công');
        }
        return redirect()->back()->with('error','Thay đổi thông tin thất bại');
    }

    public function addCart(Request $request) {
        if (client()->user()->cartClient) {
            $cart=client()->user()->cartClient;
            $cart = json_decode($cart);
            foreach ($cart as $value) {
                if($value->idProduct == $request->idProduct && $request->size != null && $value->sizeProduct == $request->size){
                    if($request->sol == null){
                        $value->sol += 1;
                    }
                    else{
                        $value->sol += $request->sol;
                    }
                    $addCart['cartClient'] =$cart;
                    if(client()->user()->update($addCart)){
                        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
                    }
                    else{
                        return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
                    }
                }

                if($value->idProduct == $request->idProduct && $request->size == null && $value->sizeProduct == 'Liên hệ Order'){
                    if($request->sol == null){
                        $value->sol += 1;
                    }
                    else{
                        $value->sol += $request->sol;
                    }
                    $addCart['cartClient'] =$cart;
                    if(client()->user()->update($addCart)){
                        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
                    }
                    else{
                        return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
                    }
                }
            }
            $data = Product::where('idProduct','=',$request->only('idProduct'))->get();
            $data = json_decode($data);
            if($request->size == null){
                $data[0]->sizeProduct = 'Liên hệ Order';
                $data[0]->sol = 1;
            }
            else{
                $data[0]->sizeProduct = $request->size;
                $data[0]->sol = $request->sol;
            }
            $cart2=$data[0];
            array_push($cart, $cart2);
            $addCart['cartClient']= $cart;
            if(client()->user()->update($addCart)){
                return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
            }
            else{
                return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại thất bại');
            }
        }
        else{
            $data = Product::where('idProduct','=',$request->only('idProduct'))->get();
            $data = json_decode($data);
            if($request->size == null){
                $data[0]->sizeProduct = 'Liên hệ Order';
            }
            else{
                $data[0]->sizeProduct = $request->size;
            }
            if($request->sol == null){
                $data[0]->sol = 1;
            }
            else{
                $data[0]->sol = $request->sol;
            }
            $addCart['cartClient'] = $data;
            if(client()->user()->update($addCart)){
                return redirect()->route('shop.index')->with('success','Thêm vào giỏ hàng thành công');
            }
            else{
                return redirect()->back()->with('error','Thêm vào giỏ hàng thất bại');
            }
        }

    }

    public function cart() {
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.cart', compact('brands'));
    }

    public function deleteCart($i) {
        $carts = Auth::guard('client')->user()->cartClient;
        $carts = json_decode($carts);
        for ($j=$i; $j < count(cartData()) - 1; $j++) {
            $carts[$j] = $carts[$j+1];
        }
        unset($carts[count(cartData())-1]);
        $addCart['cartClient']= $carts;
        if(client()->user()->update($addCart)){
            return redirect()->route('client.cart')->with('success','Xóa sản phẩm thành công');
        }
        else{
            return redirect()->back()->with('error','Xóa sản phẩm thất bại');
        }
    }

    public function checkOut(Request $request) {
            $request = $request->all();
            $products = $request['product'];
            $sumPrice = 0;
            for ($i=0; $i < count($products); $i++) {
                if($products[$i]['sol']  < 0) {
                    $products[$i]['sol'] = (int) $products[$i]['sol'] * -1;
                }
                $sumPrice += $products[$i]['price']*$products[$i]['sol'];
            }
            $brands = Brand::orderBy('brand')->get();
            return view('Auth.checkOut', compact('products', 'sumPrice', 'brands'));
    }

    public function thank(OrderRequest $request) {
        $order = $request->only('nameClient', 'telClient', 'addressClient', 'note', 'sumPrice');
        $order['emailClient'] = Auth::guard('client')->user()->emailClient;
        $order['created_at'] = now();
        $order['updated_at'] = now();
        $order['status'] = 'Đang xử lí';
        $order['idOrder'] = $request->nameClient . '-' . rand(1,1000);
        $order['product'] = json_encode($request->product);
        $client['cartClient'] = null;
        if (Order::create($order) && client()->user()->update($client)) {
            $tests = Product::inRandomOrder()->limit(8)->get();
            $brands = Brand::orderBy('brand')->get();
            return view('Auth.thank', compact('brands', 'tests'));
        }
        return redirect()->back()->with('error','Đặt hàng thất bại');
    }
}
