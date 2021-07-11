<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase\Purchase;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ReportController extends Controller
{
    public function index(){
		$daily_sales=DB::table('purchases')
						->where('created_at', '>=', Carbon::today())
						->sum('pr_price');
		$weekly_sales=DB::table('purchases')
						->select('pr_price')
						->whereBetween('created_at', [
							Carbon::parse('last saturday')->startOfDay(),
							Carbon::parse('next friday')->endOfDay(),
						])->sum('pr_price');
    					
    	return view('admin.report.index',['daily_sales'=>$daily_sales,'weekly_sales'=>$weekly_sales]);
    }

    public function dailySalesReport(){
    	$products=DB::table('purchases')
            			->join('products', 'purchases.pr_id', '=', 'products.id')
            			->select('products.pr_name','products.pr_desc', 'purchases.*')
            			->where('purchases.created_at', '>=', Carbon::today())
            			->orderByDesc('purchases.id')
            			->get();
    	return response()->json([
    		'products'=>$products]);
    }
    public function weeklySalesReport(){
    	$products=DB::table('purchases')
            			->join('products', 'purchases.pr_id', '=', 'products.id')
            			->select('products.pr_name','products.pr_desc', 'purchases.*')
            			->whereBetween('purchases.created_at', [
							Carbon::parse('last saturday')->startOfDay(),
							Carbon::parse('next friday')->endOfDay(),
						])->orderByDesc('purchases.id')
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
