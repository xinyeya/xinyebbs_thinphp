<?php

use Faker\Factory;
use think\migration\Seeder;

class Content extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Factory::create('zh_CN');//选择中文库
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'username' => $faker->title,
                'email'=> $faker->email,
                'content' => $faker->realText($maxNbChars = 10, $indexSize = 2),
            ];
        }
        $this->table('content')->insert($data)->save();
    }
}