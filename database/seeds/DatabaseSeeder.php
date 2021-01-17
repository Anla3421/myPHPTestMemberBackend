<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // factory(App\User::class,10)->create();

        // for (i=0;$newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7));i++){
        //     $arrayName = array('' => , );
        // }
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天

        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'account' =>'ccccc',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'gender' =>'male',
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            'account' =>'bbbbb',
            'name' => '123',
            'password' => Hash::make('123'),
            'gender' =>'female',
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0954654654',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            'account' =>'aaaaa',
            'name' => '99999',
            'password' => Hash::make('99999'),
            'gender' =>'male',
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0987987987',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
    }
}