<?php
namespace Home\Model;
use Think\Model;
use Think\Model\RelationModel;
class NewsModel extends RelationModel{
    protected $_link = array(
        'Category' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'Category',  //要关联的模型名
            'foreign_key' => 'cate_id',  //关联的外键，本表中的字段
            'mapping_name' => 'category_data' //用于保存获取的数据的名称字段
        )
    );
}