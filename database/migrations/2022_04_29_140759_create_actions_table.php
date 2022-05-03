<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments("id_acao");
            $table->integer("id_pipeline")->unsigned();
            $table->foreign("id_pipeline")->references('id_pipeline')->on('pipelines');
            $table->integer("ordem")->default(1);
            $table->string("token",50)->nullable();
            $table->string("acao",100);
            $table->text("info")->nullable();
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
        Schema::dropIfExists('actions');
    }
}
