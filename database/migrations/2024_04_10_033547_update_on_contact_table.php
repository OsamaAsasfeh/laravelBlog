<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('contacts', function (Blueprint $table) {
             
           $table->string('name')->nullabl();
           $table->string("email")->nullable();
           $table->text("subject")->nullable();
           
           
            
        
        
        
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            // Drop the id column if the migration is rolled back
            $table->dropColumn('id');
        });
    }
};
