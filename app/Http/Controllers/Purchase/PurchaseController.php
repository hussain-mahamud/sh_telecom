<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product\Product;
use App\Models\Purchase\Purchase;


class PurchaseController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$purchaseList=DB::table('purchases')
            			->join('products', 'purchases.pr_id', '=', 'products.id')
            			->select('products.*', 'purchases.*')
            			->orderByDesc('purchases.id')
            			->simplePaginate(10);
    	return view("admin.purchase.index",['purchaseList'=>$purchaseList]);
    }

    public function createOrder(){
    	$products=DB::table('products')
    				->select('id','pr_name')
    				->orderByDesc('id')
    				->get();
    	//dd($products);
    	return view("admin.purchase.createOrder",['products'=>$products]);
    }

    public function saveOrder(Request $req)
    {
    	 $req->validate([
                'pr_id'        	=> 'required',
                'pr_price'    	=> 'required',
                'pc_qty'		=> 'required',
            ]);

    	 $purchase= new Purchase();
    	 $purchase->pr_id=$req->pr_id;
    	 $purchase->pc_qty=$req->pc_qty;
    	 $purchase->pr_price=$req->pr_price;
    	 $purchase->c_name=$req->c_name;
    	 $purchase->c_phone=$req->c_phone;
    	 $purchase->c_address=$req->c_address;
    	 $purchase->c_remarks=$req->c_remarks;
    	 $purchase->save();
    	 $update=DB::table('products')
    	 			
    	 			->where('id', '=', $req->pr_id)
    	 			->increment('sold_qty', $req->pc_qty);
    	 return redirect()->route('sell')->with('success','Order placed Successfully'); 

    }

    public function editOrder($id){
    	$products=Product::all();
    	$order=DB::table('purchases')
            			->select( 'purchases.*')
            			->where('id','=',$id)
            			->get();
            			//dd($order);
        return view("admin.purchase.editOrder",['products'=>$products,'order'=>$order]);
    }
   public function updateOrder(Request $req)
    {
    	 $req->validate([
                'pr_id'        	=> 'required',
                'pr_price'    	=> 'required',
                
            ]);

    	 $purchase=Purchase::find($req->id);
    	 $purchase->pr_id=$req->pr_id;
    	 $purchase->pc_qty=$req->pc_qty;
    	 $purchase->pr_price=$req->pr_price;
    	 $purchase->c_name=$req->c_name;
    	 $purchase->c_phone=$req->c_phone;
    	 $purchase->c_address=$req->c_address;
    	 $purchase->c_remarks=$req->c_remarks;
    	 $purchase->save();
    	 if($req->previous_qty !=$req->pc_qty){
    	 	$update=DB::table('products')
    	 			->where('id', '=', $req->pr_id);
			$update->decrement('sold_qty', $req->previous_qty);
    	 	$update->increment('sold_qty', $req->pc_qty);
    	 }
    	
    	 return redirect()->route('sell')->with('success','Order updated Successfully'); 

    }
}
