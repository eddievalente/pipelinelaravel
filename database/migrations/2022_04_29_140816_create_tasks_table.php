<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments("id_task");
            $table->integer("id_acao")->unsigned();
            $table->foreign("id_acao")->references('id_acao')->on('actions');
            $table->integer("id_pipeline")->unsigned();
            $table->foreign("id_pipeline")->references('id_pipeline')->on('pipelines');
            $table->integer("ordem")->default(1);
            $table->string("token",50)->nullable();
            $table->string("tarefa",100);
            $table->date("dtinicio")->nullable();
            $table->date("dtentrega")->nullable();
            $table->integer("prioridade")->default(4);
            $table->integer("indicador")->default(4);
            $table->integer("progresso")->default(0);
            $table->text("instrucao")->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
