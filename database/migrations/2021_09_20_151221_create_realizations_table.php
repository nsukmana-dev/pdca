<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realizations', function (Blueprint $table) {
            $table->id();
            $table->string("strategic_plan_id");
            $table->double("actual");
            $table->string("realization");
            $table->double("to_target");
            $table->string("issue")->nullable();
            $table->string("action_plan")->nullable();
            $table->date("due_date_action_plan")->nullable();
            $table->integer("PIC")->nullable();
            $table->string("pica_attachment")->nullable();
            $table->string("pica_status")->nullable();
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
        Schema::dropIfExists('realizations');
    }
}
