<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
use \Auth;

class OrderController extends Controller
{
    public function orderListClient() {
        $emailClient = Auth::guard('client')->user()->emailClient;
        $orders = Order::where('emailClient',$emailClient)->orderBy('created_at','DESC')->get();
        $i = 0;
        foreach ($orders as $order) {
            $order->product = json_decode($order->product);
            $i++;
        }
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.orderList', compact('brands', 'orders'));
    }

    public function orderListAdmin() {
        $orders = Order::orderBy('created_at','DESC')->paginate(10);
        return view('Admin.orders', compact('orders'));
    }

    public function orderSingleAdmin(Order $order) {
        $ords = Order::where('idOrder',$order->idOrder)->first();
        $pros = json_decode($ords->product);
        $i = 0;
        foreach ($pros as $value) {
            $name =Product::where('idProduct',$value->idProduct)->first();
            $orderProducts[$i]['nameProduct'] = $name->nameProduct;
            $orderProducts[$i]['idProduct'] = $value->idProduct;
            $orderProducts[$i]['sol'] = $value->sol;
            $orderProducts[$i]['size'] = $value->size;
            $i++;
        }
        return view('Admin.singleOrder', compact('order', 'orderProducts'));
    }

    public function comfirmOrder(Order $order) {
        $d = json_decode($order->product);
        for ($i=0; $i < count($d); $i++) {
            $product = Product::where('idProduct',$d[$i]->idProduct)->first();
            $pro['quantityProduct'] = $product->quantityProduct - $d[$i]->sol;
            if($pro['quantityProduct']<0){
                return redirect()->back()->with('error','Cửa hàng không đủ số lượng sản phẩm order');
            }
            $product->update($pro);
        }

        $ord['status'] = 'Đang giao';
        if ($order->update($ord)) {
            return redirect()->route('orderListAdmin')->with('success','Cập nhật trạng thái thành công');
        }
        return redirect()->back()->with('error','Cập nhật trạng thái thất bại');
    }

    public function completeOrder(Order $order) {
        $ord['status'] = 'Giao hàng thành công';
        if ($order->update($ord)) {
            return redirect()->back()->with('success','Cập nhật trạng thái thành công');
        }
        return redirect()->back()->with('error','Cập nhật trạng thái thất bại');
    }

    public function deleteOrder(Order $order) {
        $ord['status'] = 'Đã hủy';
        if ($order->update($ord)) {
            return redirect()->back()->with('success','Cập nhật trạng thái thành công');
        }
        return redirect()->back()->with('error','Cập nhật trạng thái thất bại');
    }
}
