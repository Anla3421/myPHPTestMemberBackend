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
        // $this->call(ShopTableSeeder::class);
        $this->call(MaxdisSeeder::class);
        $this->call(MaxdisDataSeeder::Class);
        
        $newtime=time()+(random_int(1,24)*random_int(1,60)*random_int(1,60)*random_int(1,7)); //小時,分,秒,天
        
       /**
         * User information
         */
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'admin',
            'password' => Hash::make('admin'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'administrator',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            'uid' =>Str::random(5),
            'name' => '123',
            'password' => Hash::make('123'),
            // 'password' => '123', //for test
            'gender' =>'female',
            'level' => 2,
            'position' => 'administrator',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0954654654',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            'uid' =>Str::random(5),
            'name' => '99999',
            'password' => Hash::make('99999'),
            // 'password' => '99999', //for test
            'gender' =>'male',
            'level' => 3,
            'api_token'=>Str::random(32),
            'position' => 'user',
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0987987987',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'aluo',
            'password' => Hash::make('aluo'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'administrator',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'aluouser',
            'password' => Hash::make('aluo'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'user',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'ukyo',
            'password' => Hash::make('ukyo'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'administrator',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'ukyouser',
            'password' => Hash::make('ukyo'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'user',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'bobo',
            'password' => Hash::make('bobo'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'administrator',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'uid' =>Str::random(5),
            'name' => 'bobouser',
            'password' => Hash::make('bobo'),
            // 'password' => 'admin', //for test
            'gender' =>'male',
            'level' => 1,
            'position' => 'user',
            'api_token'=>Str::random(32),
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0912123123',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);

        
    }

    //     Schema::create('tasks', function (Blueprint $table) {
    //         $table->bigIncrements('id');
    //         $table->unsignedBigInteger('user_id');
    //         $table->string('title');
    //         $table->text('description')->nullable();
    //         $table->foreign('user_id')
    //                 ->references('id')
    //                 ->on('users')
    //                 ->onDelete('cascade');

    //         $table->timestamps();
}