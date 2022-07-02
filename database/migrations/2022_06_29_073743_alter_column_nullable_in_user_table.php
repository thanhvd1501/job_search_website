<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnNullableInUserTable extends Migration
{

    public function up()
    {
        Schema ::table('users', function (Blueprint $table) {
            if (Schema ::hasColumn('users', 'deleted_at')) {
                $table -> timestamp('deleted_at') -> nullable();
            }
        });
        Schema ::table('company', function (Blueprint $table) {
            if (Schema ::hasColumn('company', 'deleted_at')) {
                $table -> timestamp('deleted_at') -> nullable();
            }
        });
        Schema ::table('file', function (Blueprint $table) {
            if (Schema ::hasColumn('file', 'deleted_at')) {
                $table -> timestamp('deleted_at') -> nullable();
            }
        });
    }

    public function down()
    {
    }
}
