<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->Integer('pr_id');
            $table->Integer('pc_qty')->default(1);
            $table->String('c_name')->nullable();
            $table->String('c_phone')->nullable();
            $table->String('c_address')->nullable();
            $table->String('c_remarks')->nullable();
            $table->double('pr_price')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
