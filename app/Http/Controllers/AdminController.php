<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index(){
    	$daily_sales=DB::table('purchases')
    	    			->whereRaw('Date(created_at) = RETURN current_date')
    	    			->sum('pr_price');
    	$weekly_sales=DB::table('purchases')
    	    			->whereRaw('Date(purchases.created_at) >= DATE_SUB(RETURN current_date, INTERVAL 6 DAY)')
    	    			->sum('pr_price');
    	return view('admin.index',['daily_sales'=>$daily_sales,'weekly_sales'=>$weekly_sales]);
    }
}
