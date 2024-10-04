<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Summary of CreateDemandsTable
 */
class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id(); // ID de la demande
            $table->string('session'); // Session de soutenance
            $table->string('theme'); // Thème
            $table->string('response'); // Réponse
            $table->string('name')->default('Nom par défaut'); // Valeur par défaut pour 'name'
            $table->string('lastname'); //
            $table->string('email'); //
            $table->string('tel'); //
            $table->string('matricule'); //
            $table->string('class'); //
            $table->string('parcours'); //
            $table->string('problematique'); //
            $table->string('Objectif general'); //
            $table->string('Objectifs specifiques'); //
            $table->string('Resultats attendus'); //
            $table->timestamp('date'); // Date de la demande
            $table->timestamps(); // Horodatages automatiques
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }

    /**
     */
    public function __construct() {
    }
}
