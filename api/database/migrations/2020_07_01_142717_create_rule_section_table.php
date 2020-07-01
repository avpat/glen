<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_section', function (Blueprint $table) {
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('rule_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rule_section');
    }
}
