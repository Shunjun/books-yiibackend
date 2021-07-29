<?php

namespace app\models;

use yii;
use yii\db\ActiveRecord;

class Books extends ActiveRecord
{
  public function attributeLabels()
  {
    return [
      'id' => '编号',
      'name' => '书名',
      'author' => '作者',
      'subject' => '类目',
      'ISBN' => 'ISBN',
      'describe' => '简介',
    ];
  }


  public function rules()
  {
    return [
      [['id'], 'integer'],
      [['name', 'author', 'subject', 'ISBN', 'describe'], 'safe'],
    ];
  }
}
