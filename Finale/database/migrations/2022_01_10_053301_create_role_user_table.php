<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            //$table->id();
            //$table->unsignedBigInteger(column: 'role_id');
            //$table->unsignedBigInteger(column: 'user_id');
            $table->foreignId(column:'role_Id')->constrained()->onDelete(action:'cascade');
            $table->foreignId(column:'user_Id')->constrained()->onDelete(action:'cascade');
            $table->timestamps();

            //$table->foreign(column: 'role_id')->references(column:'id')->on(table: 'roles')->onDelete(action: 'cascade');
            //$table->foreign(column: 'user_id')->references(column:'id')->on(table: 'users')->onDelete(action: 'cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

       // Schema::table(table:'role_user', function (Blueprint $tabletable) {
          //  $table->dropForeign(index:'role_user_role_id_foreign');
            //$table->dropForeign(index:'role_user_user_id_foreign');
        //});
        Schema::dropIfExists('role_user');
    }
}
