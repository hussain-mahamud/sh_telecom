<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
		dd(date('Y-d-m'));
			$daily_sales=DB::table('purchases')
    	    			->where('created_at','=', date())
    	    			->sum('pr_price');
    	// $daily_sales=DB::table('purchases')
    	//     			->whereRaw('Date(created_at) = CURDATE()')
    	//     			->sum('pr_price');
    	// $weekly_sales=DB::table('purchases')
    	//     			->whereRaw('Date(purchases.created_at) >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)')
    	//     			->sum('pr_price');
    	return view('admin.index',['daily_sales'=>$daily_sales,'weekly_sales'=>$weekly_sales]);
    }
}
