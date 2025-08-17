<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('department_leads', function (Blueprint $table) {
            // Drop bad FK if still there
            $table->dropForeign('department_leads_role_id_foreign');

            // Add correct FK
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('department_leads', function (Blueprint $table) {
            $table->dropForeign(['department_id']);

            $table->foreign('department_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
    }
};
