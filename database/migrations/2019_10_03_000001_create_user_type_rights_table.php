<?php

use App\Models\UserRights;
use App\Models\UserType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserTypeRightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_type_rights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_type_id');
            $table->unsignedBigInteger('user_right_id')->nullable();
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->foreign('user_right_id')->references('id')->on('user_rights')->onDelete('set null');
        });

        // Give all rights to Super Administrator type
        $superAdmin = DB::table('user_types')->where('name','Super Administrator')->find(1);
        $rights = DB::table('user_rights')->get();

        foreach($rights as $right){
            DB::table('user_type_rights')->insert(array(
                'user_right_id' => $right->id,
                'user_type_id' => $superAdmin->id
            ));
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_type_rights', function (Blueprint $table) {
            $table->dropForeign('user_type_rights_user_type_id_foreign');
            $table->dropForeign('user_type_rights_user_right_id_foreign');
        });
        Schema::dropIfExists('user_type_rights');
    }
}
