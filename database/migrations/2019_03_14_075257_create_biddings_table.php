<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiddingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biddings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("company_id");
            $table->integer("project_id");
            $table->string("bidding_description")->default("sample bidding description");
            $table->string("status")->default("not accepted");
            $table->string("price");
            $table->timestamps();
        });

        Schema::create('user_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id");
            $table->string("project_title")->default("sample title");
            $table->string("project_description")->default("sample project description");
            $table->string("price");
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
        Schema::dropIfExists('biddings');
        Schema::dropIfExists('user_projects');
    }
}
