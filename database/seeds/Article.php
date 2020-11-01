<?php

use Faker\Factory;
use think\migration\Seeder;

class Article extends Seeder
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
                'desc' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                'labels' => implode(",", $faker->creditCardDetails),
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'content' => $faker->randomHtml(2,3),
                'create_time'=> date('Y-m-d H:i:s'),
                'status' => 1,
                'user_id'=> 1,
                'classify_id'=> 1
            ];
        }
        $this->table('article')->insert($data)->save();
    }
}