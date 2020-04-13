<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FirstAddFromV extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('horses', function (Blueprint $table) {
            $table->string('gender');
            $table->integer('weight');
            $table->mediumText('ColourMarkings');
            $table->mediumText('breed');
            $table->date('dob');
            $table->mediumText('healthIssues');
            $table->mediumText('pastAilments');
            $table->date('lastWorked');
            $table->mediumText('workSchedule');
            $table->mediumText('feed');
            $table->mediumText('feedRecipe');
            $table->mediumText('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('horses', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('weight');
            $table->dropColumn('ColourMarkings');
            $table->dropColumn('breed');
            $table->dropColumn('dob');
            $table->dropColumn('healthIssues');
            $table->dropColumn('pastAilments');
            $table->dropColumn('lastWorked');
            $table->dropColumn('workSchedule');
            $table->dropColumn('feed');
            $table->dropColumn('feedRecipe');
            $table->dropColumn('notes');
        });
    }
}
