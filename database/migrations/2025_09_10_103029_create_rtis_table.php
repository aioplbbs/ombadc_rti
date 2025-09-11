<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('full_name', 50);
            $table->enum('gardian_type', ['Father', 'Husband']);
            $table->string('gardian_name', 50);
            $table->text('permanent_address');
            $table->string('identity', 20)->nullable()->comment('Particulars in respect of Identity of the applicant');
            $table->text('request_information')->comment('Particulars of information solicited');
            $table->boolean('is_info_given')->comment('Has the information been provided earlier?');
            $table->boolean('info_by_authority')->comment('Is this information not made available by the Public authority?');
            $table->boolean('application_fee')->comment('Have you deposited application fee?');
            $table->string('application_fee_challan', 20)->nullable();
            $table->boolean('is_bpl');
            $table->text('concent');
            $table->enum('status', ["Documents", "Submitted", "In Process", "Approve", "Reject", "Responded"])->default("Documents")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rtis');
    }
}
