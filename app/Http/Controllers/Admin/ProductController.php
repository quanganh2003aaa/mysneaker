<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Str;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function home() {
        return view('Admin.home');
    }

    public function create() {
        $brands = Brand::orderBy('brand')->get();
        return view('Admin.products.createProduct', compact('brands'));
    }

    public function index() {
        $products = Product::orderBy('id','DESC')->paginate(10);
        return view('Admin.products.index', compact('products'));
    }

    public function store(ProductStoreRequest $request) {
        // dd($request);
        $product = $request->only('nameProduct', 'brandProduct', 'idProduct', 'sizeProduct', 'descriptionProduct', 'priceProduct', 'quantityProduct');
        $product['slug']  = Str::slug($product['nameProduct']);
        $product['created_at'] = now();
        $product['updated_at'] = now();
        //tạo tên file
        $fileName = $request->idProduct . '.' . rand(1,1000) . time() . '.' . $request->file('imgProduct')->extension();
        //lưu trữ vào storage
        $request->file('imgProduct')->storeAs('public/product', $fileName);
        //tạo đường dẫn lưu vào db
        $imgPath = 'storage/product/' . $fileName;
        $product['imgProduct']=$imgPath;

        Product::create($product);
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product) {
        dd($product);
        if ($product->delete()) {
            Storage::delete(Str::replace('storage', 'public', $product['imgProduct']));
            return redirect()->back()->with('success','Xóa thành công');
        }
        return redirect()->back()->with('error','Xóa thất bại');
    }

    public function edit(Product $product) {
        // dd($product);
        $brands = Brand::orderBy('brand')->get();
        return view('Admin.products.edit', compact('product'), compact('brands'));
    }

    public function update(ProductUpdateRequest $request, Product $product) {
        $data = $request->only('nameProduct', 'brandProduct', 'idProduct', 'sizeProduct', 'descriptionProduct', 'priceProduct', 'quantityProduct');
        $data['slug'] = Str::slug($data['nameProduct']);
        $data['updated_at'] = now();

        if($request->imgProduct){
            //xóa file img nếu sửa
            Storage::delete(Str::replace('storage', 'public', $product['imgProduct']));

            //tạo tên file
            $fileName = $request->idProduct . '.' . rand(1,1000) . time() . '.' . $request->file('imgProduct')->extension();
            //lưu trữ vào storage
            $request->file('imgProduct')->storeAs('public/product', $fileName);
            //tạo đường dẫn lưu vào db
            $imgPath = 'storage/product/' . $fileName;
            $data['imgProduct']=$imgPath;
        }

        if($product->update($data)){
            return redirect()->route('admin.product.index')->with('success','Sửa thành công');
        }
        return redirect()->back()->with('error','Sửa thất bại');
    }

    public function sol(Request $request)
    {
        $products = Product::orderBy('quantityProduct')->paginate(10);
        return view('Admin.products.index', compact('products'));
    }

}
