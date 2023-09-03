<?php
use App\Models\Product;

if(! function_exists('client'))
{
    function client()
    {
        return \Auth::guard('client');
    }

    function cartData()
    {
        if(client()->check()){
            if(Auth::guard('client')->user()->cartClient != null){
                $carts = Auth::guard('client')->user()->cartClient;
                $carts = json_decode($carts);
                $i = 0;
                $pros= [];
                foreach ($carts as $value) {
                    array_push($pros, $value);
                    $i++;
                    if ($i==5) {
                        break;
                    }
                }
                return $pros;
            }
        }
        else{
            return 0;
        }
    }
    function cartDataAll()
    {
        if(client()->check()){
            if(Auth::guard('client')->user()->cartClient != null){
                $carts = Auth::guard('client')->user()->cartClient;
                $pros = json_decode($carts);
                return $pros;
            }
        }
        else{
            return 0;
        }
    }
    function countCartData()
    {
        if(client()->check()){
            if(Auth::guard('client')->user()->cartClient != null){
                $carts = Auth::guard('client')->user()->cartClient;
                $carts = json_decode($carts);
                $pros = 0;
                foreach ($carts as $value) {
                    $pros += $value->sol;
                }
                return $pros;
            }
        }
        else{
            return 0;
        }
    }
    function sumPrice()
    {
        if(client()->check()){
            if(Auth::guard('client')->user()->cartClient != null){
                $carts = Auth::guard('client')->user()->cartClient;
                $pros = json_decode($carts);
                $sum = 0;
                foreach ($pros as $value) {
                    $sum=$value->priceProduct*$value->sol + $sum;
                }
                return $sum;
            }
        }
        else{
            return 0;
        }
    }


}




