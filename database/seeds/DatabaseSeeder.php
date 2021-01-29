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

        /**
         * User information
         */
        DB::table('users')->insert([
            // 'name' => Str::random(10),
            'account' =>'ccccc',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'gender' =>'male',
            'level' => 1,
            'position' => 'administrator',
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
            'level' => 2,
            'position' => 'administrator',
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
            'level' => 3,
            'position' => 'user',
            'remember_check' =>'ok',
            'remember_token' =>'NULL',
            'cellphone' => '0987987987',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);

        /**
         * Shop data
         */
        DB::table('shop')->insert([
            'id' =>'1',
            'pid'=>'1',
            'title'=>'A牌運動鞋',
            'description'=>'<ul>
            <li>
            <h1><em><strong>好山好水好運動鞋</strong></em></h1>
            </li>
            <li>
            <h1>1</h1>
            </li>
            <li>
            <h1>2</h1>
            </li>
            <li>
            <h1>3</h1>
            </li>
            <li>
            <h1><em><strong><img alt="" src="http://test777.ukyo.idv.tw/userfiles/files/1.jpg" style="height:416px; width:625px" /></strong></em></h1>
            </li>
        </ul>
        ',
            'top'=>'1',
            'price'=>'10000',
            'finalprice'=>'5000',
            'amount'=>'10',
            'discount'=>'50',
            'classify'=>'1',
            'kid'=>'1',
            'type'=>'1',
            'did'=>'1',
            'release'=>'1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('shop')->insert([
            'id' =>'2',
            'pid'=>'2',
            'title'=>'B牌筆電',
            'description'=>'<p>開機很快<p>',
            'top'=>'0',
            'price'=>'50000',
            'finalprice'=>'30000',
            'amount'=>'7',
            'discount'=>'60',
            'classify'=>'2',
            'kid'=>'2',
            'type'=>'0',
            'did'=>'2',
            'release'=>'0',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);

        /**
         * classify
         */
        DB::table('classify')->insert([
            'id' =>'1',
            'title'=>'衣服',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('classify')->insert([
            'id' =>'2',
            'title'=>'3C',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('classify')->insert([
            'id' =>'3',
            'title'=>'汽車',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('keyword')->insert([
            'kid' =>'1',
            'title'=>'特賣',
            'icon'=>'icon',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('keyword')->insert([
            'kid' =>'2',
            'title'=>'優惠',
            'icon'=>'icon2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'1',
            'shop_id'=>'1',
            'title'=>'shoe1',
            'path'=>'/userfiles/files/shoe1.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'2',
            'shop_id'=>'1',
            'title'=>'shoe2',
            'path'=>'/userfiles/files/shoe2.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'3',
            'shop_id'=>'1',
            'title'=>'shoe3',
            'path'=>'/userfiles/files/shoe3.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'4',
            'shop_id'=>'1',
            'title'=>'shoe4',
            'path'=>'/userfiles/files/shoe4.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'5',
            'shop_id'=>'2',
            'title'=>'laptop1',
            'path'=>'/userfiles/files/laptop1.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'6',
            'shop_id'=>'2',
            'title'=>'laptop2',
            'path'=>'/userfiles/files/laptop2.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'7',
            'shop_id'=>'2',
            'title'=>'laptop3',
            'path'=>'/userfiles/files/laptop3.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
        DB::table('photo')->insert([
            'pid' =>'8',
            'shop_id'=>'2',
            'title'=>'laptop4',
            'path'=>'/userfiles/files/laptop4.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s',$newtime),
        ]);
    }
}