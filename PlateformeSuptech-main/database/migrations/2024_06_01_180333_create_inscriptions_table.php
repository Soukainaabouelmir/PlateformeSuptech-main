<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $inscriptions = DB::table('inscriptions')->select('id', 'apogee')->get();

        
        foreach ($inscriptions as $inscription) {
            DB::table('etudient')->where('id', $inscription->id)->update([
                'apogee' => $inscription->apogee,
            ]);
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};