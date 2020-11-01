<?php

use think\migration\Migrator;
use think\migration\db\Column;

class FriendLink extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $sql = <<<XXX
DROP TABLE IF EXISTS `bbs_friend_link`;
CREATE TABLE `bbs_friend_link`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '友链id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '网站标题',
  `link` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '网站链接',
  `delete_time` varchar(20) NULL DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '友情链接表' ROW_FORMAT = Dynamic;
XXX;
        $this->execute($sql);
    }

    public function down()
    {
        $this->dropTable('friend_link');
    }
}
