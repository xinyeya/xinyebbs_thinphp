<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Article extends Migrator
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
        $sql = <<<EON
DROP TABLE IF EXISTS `bbs_article`;
CREATE TABLE `bbs_article`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章标题',
  `desc` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文章简介',
  `labels` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '标签',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文章内容',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章封面',
  `status` tinyint(1) NULL DEFAULT 0 COMMENT '文章状态，1：已发布，0：草稿文',
  `create_time` datetime(0) NULL DEFAULT NULL COMMENT '文章发布时间',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '文章作者id',
  `classify_id` int(11) NULL DEFAULT NULL COMMENT '分类id',
  `delete_time` varchar(20) NULL DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 0 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '分类表' ROW_FORMAT = Dynamic;
EON;

        $this->execute($sql);
    }

    public function down()
    {
        $this->dropTable('article');
    }
}
