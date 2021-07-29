<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\BookLibary;
use yii\data\ActiveDataProvider;

class LibaryController extends Controller
{
  public function  actionIndex()
  {
    $query = BookLibary::find();

    $pagination = new Pagination([
      'defaultPageSize' => 5,
      'totalCount' => $query->count(),
    ]);

    $books = $query->orderBy('name')
      ->offset($pagination->offset)
      ->limit($pagination->limit)
      ->all();

    $provider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => $pagination,
    ]);

    return $this->render('index', [
      'books' => $books,
      'pagination' => $pagination,
      'provider' => $provider
    ]);
  }
}
