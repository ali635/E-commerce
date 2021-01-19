<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('information_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();

            $table->unique(['information_id','locale']);
            $table->foreign('information_id')->references('id')->on('information')->onDelete('cascade');
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
        Schema::dropIfExists('information_translations');
    }
}
