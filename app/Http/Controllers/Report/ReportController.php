<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase\Purchase;
use Illuminate\Support\Facades\DB;
class ReportController extends Controller
{
    public function index(){
    	$daily_sales=DB::table('purchases')
    					->whereRaw('Date(created_at) = CURDATE()')
    					->sum('pr_price');
    	$weekly_sales=DB::table('purchases')
    					->whereRaw('Date(purchases.created_at) >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)')
    					->sum('pr_price');
    					
    	return view('admin.report.index',['daily_sales'=>$daily_sales,'weekly_sales'=>$weekly_sales]);
    }

    public function dailySalesReport(){
    	$products=DB::table('purchases')
            			->join('products', 'purchases.pr_id', '=', 'products.id')
            			->select('products.pr_name','products.pr_desc', 'purchases.*')
            			->whereRaw('Date(purchases.created_at) = CURDATE()')
            			->orderByDesc('purchases.id')
            			->get();
            	//dd($products);
    	return response()->json([
    		'products'=>$products]);
    }
    public function weeklySalesReport(){
    	$products=DB::table('purchases')
            			->join('products', 'purchases.pr_id', '=', 'products.id')
            			->select('products.pr_name','products.pr_desc', 'purchases.*')
            			->whereRaw('Date(purchases.created_at) >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)')
            			->orderByDesc('purchases.id')
            			->get();
    	return response()->json([
    		'products'=>$products]);
    }

    public function rangeSalesReport(Request $req){
    	$products=DB::table('purchases')
            			->join('products', 'purchases.pr_id', '=', 'products.id')
            			->select('products.pr_name','products.pr_desc', 'purchases.*')
            			->whereBetween('purchases.created_at',[$req->str_date,$req->end_date])
            			->orderByDesc('purchases.id')
            			->get();
            	//dd($products);
    	return response()->json([
    		'products'=>$products]);
    }
}
