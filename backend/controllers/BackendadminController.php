<?php

namespace backend\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\base\Security;
use common\models\Admin;
use common\models\AdminSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


class BackendadminController extends Controller {
	
	public $passwordHashStrategy = 'password_hash';
	public function behaviors() {
		
		return [
				'access' => [
						'class' => AccessControl::className(),
						'rules' => [
								[
										'actions' => ['index', 'create', 'update', 'delete'],
										'allow' => true,
										'roles' => ['@'],
								],
						],
				],
				
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'delete' => ['post'],
						],
				],
		];
		
	}
	
	public function actionIndex() {
			
		$searchModel = new AdminSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			
		return $this->render('index', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
        ]);
		
	}
		
	//Delete  and redirect to index
	public function actionDelete($id) {
			
		$this->findModel($id)->delete();			
		return $this->redirect(['index']);
	
	}
		
	//Search in admin table by $id
	protected function findModel($id) {		
			
		if (($model = Admin::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('El Administrador No Existe En La BD!!');
		}
		
	}
	
	//If the update is successful, it comes back to index
	public function actionUpdate($id) {
		
		$model = $this->findModel($id);
		
		if ($model->load(Yii::$app->request->post())) {
			if($model->save()) {
				return $this->redirect(['index', 'idadmin' => $model->idadmin]);
			}
			else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		}
		else {
			return $this->render('update', [
				'model' => $model,
			]);
			}
			
	}
	
	//If the form data its ok and the model has been saved, redirect to index else goes back to create form
	public function actionCreate() {
		
		$model = new Admin();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['index', 'idadmin' => $model->idadmin]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
		
	}
	
}
	
	
	
	

	
