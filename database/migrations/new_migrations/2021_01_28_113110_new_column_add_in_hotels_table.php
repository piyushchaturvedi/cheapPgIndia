<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewColumnAddInHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotels', function (Blueprint $table) {
            $table->string('accomodation_type')->after('min_day_stays')->nullable();
            $table->string('accomodation_for')->after('accomodation_type')->nullable();
            $table->boolean('is_sharable')->after('accomodation_for')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_hotels', function (Blueprint $table) {
            $table->dropColumn('accomodation_type');
            $table->dropColumn('accomodation_for');
            $table->dropColumn('is_sharable');

        });
    }
}
