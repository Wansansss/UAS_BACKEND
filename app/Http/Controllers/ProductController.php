<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('auth');
    // }

    public function store(Request $request){
        $unit_price = str_replace(['Rp ', '.', ' '], '', $request->unit_price);
        $sale_price = str_replace(['Rp ', '.', ' '], '', $request->sale_price);
    	
    	$data=new Product;
        $data->product_code=$request->code;
    	$data->name= $request->name;
        $data->category = $request->category;
    	$data->stock = $request->stock;
    	$data->unit_price = $unit_price;
    	// $data->total_price = $request->stock * $request->unit_price;
        $data->sales_unit_price = $sale_price;
        // $data->sales_stock_price =$request->stock * $request->sale_price;


        $data->save();
        return Redirect()->route('add.product');
    }// fungsi untuk menambahkan produk ke db

    public function productEdit($id)
    {
        $products = Product::find($id);
     
        return view('Admin.edit_product',compact('products'));

    }//fungsi untuk menampilkan form edit product

    public function updateProducts(Request $request){
        $unit_price = str_replace(['Rp ', '.', ' '], '', $request->update_unit_price);
        $sale_price = str_replace(['Rp ', '.', ' '], '', $request->update_sale_price);
        Product::where('id',$request->id)->update([
           'name' => $request->update_name,
           'category' => $request->update_category,
           'unit_price'=> $unit_price,
           'sales_unit_price' => $sale_price,
        ]);
        
        return Redirect()->route('all.product');
    }//fungsi untuk menyimpan customer yang sudah di edit


    public function allProduct(){
    	$products = Product::all();
    	return view('Admin.all_product',compact('products'));
    }//fungsi untuk menampilkan semua produk 

    public function availableProducts(){
        $products = Product::where('stock','>','0')->get();
        return view('Admin.available_products',compact('products'));
    }//fungsi untuk menampilkan produk yang tersedia 

    public function formData($id){
        $product = Product::find($id);
        
        return view('Admin.add_order',compact('product'));
        // return view('Admin.add_order',['product'=>$product]);
    }//fungsi untuk menambahkan produk

    public function purchaseData($id){
        $product = Product::find($id);
        
        return view('Admin.purchase_products',compact('product'));
    }//fungsi untuk menambahkan stok produk
    public function storePurchase(Request $request){

        Product::where('name',$request->name)->update(['stock' => $request->stock + $request->purchase]);
        
        return Redirect()->route('all.product');
    }//fungsi untuk menyimpan stok yang di tambahkan ke db
    
    public function delete(Request $request)
    {
        $product =  Product::find($request->id);
        // if($product->delete())
        // {
           
        //     return redirect()->back()->with(['msg' => 1]);
        // }
        // else
        // {
        //     return redirect()->back()->with(['msg' => 2]);
        // }
        $product->delete();
        return Redirect() ->route('all.product')->with('success', 'Data pelanggan berhasil dihapus');

    }//fungsi untuk menghapus product di db

}
