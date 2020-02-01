<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulkemailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('bulkemails', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //       $table->string('EMAIL');
        //         $table->string('CUSTOMER_NAME');
        //         $table->string('PHONE');
        //         $table->string('TICKET_CATEGORY');
        //           $table->string('STATUS_SentUnsent');
        //             $table->string('ivcode');
        //             $table->string('attend');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulkemails');
    }
}
