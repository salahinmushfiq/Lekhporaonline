<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_title');
            $table->string('ad_description', 45)->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('payment_amount');
            $table->integer('slot_no');
            $table->timestamp('ad_start_date');
            $table->integer('ad_duration_day');
            $table->integer('ad_duration_sec');
            $table->string('file_name')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
