<?php

use think\Db;
class Common{
    // 查询用户个人信息
    public static function getUserInfo() {
        // 查询用户信息
        return Db::table('bbs_user')
            ->where('id', 1)
            ->field( 'password, delete_time',true)
            ->find();
    }

    // 获取所有标签
    public static function getLabels() {
        return Db::table('bbs_labels')
            ->field('delete_time', true)
            ->select();
    }

    // 获取友情链接
    public static function getLink() {
        return Db::table('bbs_friend_link')
            ->field('delete_time', true)
            ->select();
    }

    // 获取音乐链接
    public static function getMusic() {
        return Db::table("bbs_music")
            ->field('delete_time', true)
            ->select();
    }
}