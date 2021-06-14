<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('workflow_id')->nullable();
            $table->string('form_route');
            $table->integer('is_auto_responder')->nullable();
            $table->integer('confirm_page')->nullable();
            $table->string('resp_subject')->nullable();
            $table->string('resp_from_email')->nullable();
            $table->string('resp_from_name')->nullable();
            $table->text('resp_email_content')->nullable();
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
        Schema::dropIfExists('forms');
    }
}
