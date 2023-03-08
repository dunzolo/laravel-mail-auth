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
        Schema::table('projects', function (Blueprint $table) {
            // // PRIMA CREA LA COLONNA
            $table->unsignedBigInteger('type_id')
                ->nullable()
                ->after('id');
            //DOPO CREO LA FOREIGN KEY
            $table->foreign('type_id')
                ->references('id') //nome della colonna a cui fa riferimento
                ->on('types') //tabella a cui appartiene
                ->onDelete('set null'); //setto a NULL la colonna se viene cancellata la categoria
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //1° PASSAGGIO: elimina nella tabella posts la colonna foreign category_id
            $table->dropForeign('projects_type_id_foreign');

            //2° PASSAGGIO: elimina la colonna
            $table->dropColumn('type_id');
        });
    }
};
