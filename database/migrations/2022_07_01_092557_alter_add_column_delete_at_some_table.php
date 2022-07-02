<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddColumnDeleteAtSomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema ::table('some', function (Blueprint $table) {
            Schema ::table('users', function (Blueprint $table) {
                if ( ! Schema ::hasColumn('users', 'deleted_at')) {
                    $table -> timestamp('deleted_at') -> nullable();
                }
            });
            Schema ::table('companies', function (Blueprint $table) {
                if ( ! Schema ::hasColumn('companies', 'deleted_at')) {
                    $table -> timestamp('deleted_at') -> nullable();
                }
            });
            Schema ::table('files', function (Blueprint $table) {
                if ( ! Schema ::hasColumn('files', 'deleted_at')) {
                    $table -> timestamp('deleted_at') -> nullable();
                }
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
