<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebAppItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_app_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('web_app_id');
            $table->integer('custom_fields_id');
            $table->string('item_name');
            $table->string('details_slug');
            $table->text('custom_fields_values');
            $table->date('expiry_date');
            $table->date('release_date');
            $table->boolean('enabled');
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
        Schema::dropIfExists('web_app_items');
    }
}
