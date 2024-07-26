<?php
// database/migrations/xxxx_xx_xx_xxxxxx_clean_up_roles_column_in_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CleanUpRolesColumnInUsersTable extends Migration
{
    public function up()
    {
        // Clean up invalid roles
        DB::table('users')
            ->whereNotIn('role', ['driver', 'admin', 'property', 'requester'])
            ->update(['role' => 'driver']); // Default valid role

        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['driver', 'admin', 'property', 'requester'])->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->change();
        });
    }
}
