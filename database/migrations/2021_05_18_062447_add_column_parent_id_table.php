<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnParentIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            //parent_id để mặc định 0 , tức là những cái nào là 0 là categories lớn nhất
            // tức là nó là thằng cha ko có thằng nào là cha của nó
            //và những cái nào là con thì nó sẽ có cái parent_id = cái parent_id của cha
            $table->integer('parent_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
}
