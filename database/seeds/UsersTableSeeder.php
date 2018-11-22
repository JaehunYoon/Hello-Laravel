<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::truncate(); // 모델과 관련된 테이블 데이터 전체 비우기
        factory('App\User', 10)->create();
    }
}
