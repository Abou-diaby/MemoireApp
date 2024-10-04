<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToDemandsTable extends Migration
{
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Ajoutez 'nullable' si nécessaire
            $table->foreign('user_id')->references('id')->on('users'); // Créez la clé étrangère
        });
    }

    public function down()
    {
        Schema::table('demands', function (Blueprint $table) {
            $table->dropColumn('user_id'); // Supprimez la colonne si nécessaire
        });
    }
}

