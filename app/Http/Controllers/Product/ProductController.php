<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product\Product;
use App\Models\Purchase\Purchase;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$products=DB::table('products')
    				->orderByDesc('id')
    				->paginate(10);
    	return view("admin.product.index",['products'=>$products]);
    }
    public function createProduct(){
    	return view("admin.product.createProduct");
    }

    public function storeProduct(Request $req)
    {
    	 $req->validate([
                'pr_name'        => 'required|unique:products|min:4',
                'pr_qty'    => 'required',
            ]);
    	 $product= new Product();
    	 $product->pr_name=$req->pr_name;
    	 $product->pr_qty=$req->pr_qty;
    	 $product->pr_desc=$req->pr_desc;
    	 $product->save();

    	 return redirect()->route('product')->with('success','Product Added Successfully'); 

    }

    public function editProduct($id){
     	$product=Product::find($id);
     	//dd($product);
    	return view("admin.product.editProduct",['product'=>$product]);
    }
    public function updateProduct(Request $req){
    	$req->validate([
                'pr_name'        => 'required|min:4',
                'pr_qty'    => 'required',
            ]);
    	$product=Product::find($req->id);
    	$product->pr_name=$req->pr_name;
    	$product->pr_qty=$req->pr_qty;
    	$product->pr_desc=$req->pr_desc;
    	$product->save();
    	return redirect()->route('product')->with('success','Product updated Successfully'); 
    }

    public function deleteProduct($id){
         $pid=Purchase::where('pr_id', $id)->get();
        if(count($pid)){
          return redirect()->back()->with('success', 'You can not delete this product! It is in Order List');  
        }
     	else{
            $product=Product::find($id);
            $product->delete();
            return redirect()->route('product')->with('success','Product deleted Successfully');
        }
    }
}
