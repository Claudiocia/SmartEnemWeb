<?php

use Illuminate\Database\Migrations\Migration;
use SmartEnem\Models\User;

class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model = User::create([
            'name' => env('ADMIN_DEFAULT_NAME', 'Admin'),
            'email' => env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'),
            'password' => bcrypt(env('ADMIN_DEFAULT_PASSWORD', 'secret')),
            'smartphone' => "71999094687",
            'regid' => "null",
            'role' => User::ROLE_ADMIN
        ]);
        $model->verified = true;
        $model->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::where('email', '=',env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'))->first();

        if($user instanceof User){
            $user->delete();
        }
    }
}
