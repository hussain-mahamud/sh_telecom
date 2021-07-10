<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'pr_id','','pc_qty','c_name','c_phone','c_address','pr_price',
        
    ];
}
