<?php

use Illuminate\Database\Seeder;
use App\models\admin\Manager;

class ManagersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'username'=>'admin',
            'password'=>'admin',
            'email'=>'admin@163.com'
        ];

        Manager::create($data);
    }
}
