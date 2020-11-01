<?php

use Faker\Factory;
use think\migration\Seeder;

class Music extends Seeder
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
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->title,
                'author' => $faker->title,
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'file_path' => $faker->imageUrl($width = 640, $height = 480)
            ];
        }
        $this->table('music')->insert($data)->save();
    }
}