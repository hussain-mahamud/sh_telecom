<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AdminController extends Controller
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
    	return view('admin.index',['daily_sales'=>$daily_sales,'weekly_sales'=>$weekly_sales]);
    }
}
