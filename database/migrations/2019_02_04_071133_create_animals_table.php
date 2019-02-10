<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumInteger("tag_id")->unique()->unsigned();
            $table->char("type",5);
            $table->date("birthday")->nullable();
            $table->tinyInteger("age")->nullable()->unsigned();
            $table->date("buy_date")->nullable();
            $table->integer("buy_price")->nullable()->unsigned();
            $table->boolean("selled");
            $table->timestamps();
        });

        Schema::create('animal_images', function (Blueprint $table) {
            $table->integer('animal_id')->unsigned();
            $table->string('image_address');
            $table->primary('animal_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
