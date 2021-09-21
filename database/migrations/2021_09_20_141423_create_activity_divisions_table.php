<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_divisions', function (Blueprint $table) {
            $table->id();
            $table->string("ad_id");
            $table->integer("year");
            $table->integer("div_id");
            $table->integer("sd_id");
            $table->integer("sp_id");
            $table->string("activity_division");
            $table->string("target_division");
            $table->double("activity_weight");
            $table->decimal("budget", 11, 2);
            $table->text("relate_division");
            $table->date("due_date_activity");
            $table->string("achievement_last_year");
            $table->integer("achievement_last_year_weight");
            $table->string("status");
            $table->integer("created_by");
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
        Schema::dropIfExists('activity_divisions');
    }
}
