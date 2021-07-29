<?php
/*
 * @Author Shunzi
 * @Date 2021-07-12 17:21:49
 * @LastEditTime 2021-07-16 13:22:47
 * @LastEditors Shunzi
 * @Description 
 * @FilePath /booklibrary/controllers/BookapiController.php
 */

namespace app\controllers;

use Yii;
use app\models\Books;
use app\models\BookSearch;
use yii\rest\Controller;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\JsonResponseFormatter;

class BookapiController extends Controller
{

  public $modelClass = 'app\models\Books';

  /**
   * 查询
   */
  public function actionIndex()
  {
    $searchModel = new BookSearch();

    $query = Books::find();

    $pagination = new Pagination([
      'defaultPageSize' => 5,
      'totalCount' => $query->count(),
    ]);

    $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $pagination);

    return $dataProvider;
  }

  /**
   * 添加数据
   */
  public function actionCreate()
  {
    $model = new Books();

    if ($model->load(Yii::$app->request->post(), '') && $model->save()) {
      return 1;
    }
    return 0;
  }

  /**
   * 删除
   */
  public function actionDelete($id)
  {
    if ($this->findModel($id)->delete()) {
      return 1;
    }
  }

  protected function findModel($id)
  {
    if (($model = Books::findOne($id)) !== null) {
      return $model;
    }
    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
