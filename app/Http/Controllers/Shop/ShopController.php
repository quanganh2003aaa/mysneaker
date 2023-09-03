<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Blog;

class ShopController extends Controller
{
    public function listShopAll($brand){
        if ($brand == 'All') {
            $pro = Product::all();
        }
        else{
            $pro = Product::where('brandProduct', $brand)->get();
        }
        $price['max'] = 0;
        foreach ($pro->all() as $value) {
            if ($value->priceProduct > $price['max']) {
                $price['max']=$value->priceProduct;
            }
        }
        $price['min'] = $price['max'];
        foreach ($pro->all() as $value) {
            if ($value->priceProduct < $price['min']) {
                $price['min']=$value->priceProduct;
            }
        }

        if (isset($_GET['to'])&&isset($_GET['from'])) {
            $price_from=$_GET['from'];
            $price_to =$_GET['to'];
            if ($brand == 'All') {
                $products = Product::where([
                    ['priceProduct', '>=', $price_from],
                    ['priceProduct', '<=', $price_to],
                ])->orderBy('updated_at', 'DESC')->paginate(9);
                $productLists = Product::where([
                    ['priceProduct', '>=', $price_from],
                    ['priceProduct', '<=', $price_to],
                ])->orderBy('updated_at', 'DESC')->paginate(4);
            }
            else{
                $products = Product::where([['brandProduct', $brand], ['priceProduct', '>=', $price_from],
                ['priceProduct', '<=', $price_to],])->orderBy('updated_at', 'DESC')->paginate(9);
                $productLists = Product::where([['brandProduct', $brand], ['priceProduct', '>=', $price_from],
                ['priceProduct', '<=', $price_to],])->orderBy('updated_at', 'DESC')->paginate(4);
            }

        }
        else {
            if ($brand == 'All') {
                $products = Product::orderBy('updated_at', 'DESC')->paginate(9);
                $productLists = Product::orderBy('updated_at', 'DESC')->paginate(4);
            }
            else{
                $products = Product::where('brandProduct', $brand)->orderBy('updated_at', 'DESC')->paginate(9);
                $productLists = Product::where('brandProduct', $brand)->orderBy('updated_at', 'DESC')->paginate(4);
            }
        }

        $brands = Brand::orderBy('brand')->get();
        return view('Auth.shop.listShopAll', compact('brands','brand', 'products', 'productLists', 'price'));
    }

    public function search(Request $request)
    {
        $search = $request['search'];
        $pro = Product::where('nameProduct','LIKE', "%{$search}%")->get();

        $price['max'] = 0;
        foreach ($pro->all() as $value) {
            if ($value->priceProduct > $price['max']) {
                $price['max']=$value->priceProduct;
            }
        }
        $price['min'] = $price['max'];
        foreach ($pro->all() as $value) {
            if ($value->priceProduct < $price['min']) {
                $price['min']=$value->priceProduct;
            }
        }

        if (isset($_GET['to'])&&isset($_GET['from'])) {
            $price_from=$_GET['from'];
            $price_to =$_GET['to'];
            $products = Product::where([['nameProduct','LIKE', "%{$search}%"],['priceProduct', '>=', $price_from], ['priceProduct', '<=', $price_to]])->orderBy('updated_at', 'DESC')->paginate(9);
            $productLists = Product::where([['nameProduct','LIKE', "%{$search}%"],['priceProduct', '>=', $price_from], ['priceProduct', '<=', $price_to]])->orderBy('updated_at', 'DESC')->paginate(4);

        }
        else {
            $products = Product::where('nameProduct','LIKE', "%{$search}%")->orderBy('updated_at', 'DESC')->paginate(9);
            $productLists = Product::where('nameProduct','LIKE', "%{$search}%")->orderBy('updated_at', 'DESC')->paginate(9);
        }

        $brands = Brand::orderBy('brand')->get();
        return view('Auth.shop.search', compact('brands', 'products', 'productLists', 'price', 'search'));
    }

    public function singleProduct($idProduct)
    {
        $tests = Product::where('idProduct', '!=', $idProduct)->limit(8)->get();
        $brands = Brand::orderBy('brand')->get();
        $product = Product::where('idProduct', $idProduct)->first();
        $product->sizeProduct = explode(',', $product->sizeProduct);
        return view('Auth.shop.singleProduct', compact('product', 'brands', 'tests'));
    }

    public function map()
    {
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.shop.map', compact('brands'));
    }

    public function blog()
    {
        $blogs = Blog::orderBy('created_at','DESC')->get();
        // dd($blog);
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.shop.blog', compact('brands', 'blogs'));
    }

    public function detailBlog(Blog $blog)
    {
        // $blogs = Blog::orderBy('created_at','DESC')->get();
        // dd($blog);
        $brands = Brand::orderBy('brand')->get();
        return view('Auth.shop.detailBlog', compact('brands', 'blog'));
    }

}
