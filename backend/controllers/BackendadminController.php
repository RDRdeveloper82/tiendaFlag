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


class BackendadminController extends Controller{
	
	public $passwordHashStrategy = 'password_hash';
	public function behaviors()
	{
		return [
				//Especifico las acciones permitidas para los usuarios registrados @ Dichas acciones no podr�n ser realizadas
				//por los usuarios no registrados ?
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
				//Los verbs son las acciones permitidas para cada m�todo HTTP de las peticiones.
				//En este caso, se especifica unicamente que para el m�todo delete se permiten unicamente las acciones post y delete
				//Si quisiera poner un filtro a todos los m�todos, ser�a con '*' => [...] aunque en caso de
				//tener restricciones espec�ficas para un m�todos en particular, dichas restricciones tienen preferencia sobre las *
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'delete' => ['post'],
						],
				],
		];
	}
		public function actionIndex(){
			
			//Declaro las variables que voy a utlizar en la vista
			//$dataProvider para el GridView y $searchModel que es el modelo de b�squeda de administradores
			
			$searchModel = new AdminSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			
			return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
		}
		//El controlador se encarga de eliminar el registro llamando al m�todo findModel que devuelve el admin que
		//hay que eliminar con el m�todo delete();
		public function actionDelete($id)
		{
			
			$this->findModel($id)->delete();
			
			return $this->redirect(['index']);
		}
		//Busca en la base de datos el admin con el id que ha recibido por par�metro
		protected function findModel($id)
		{
			
			if (($model = Admin::findOne($id)) !== null) {
				return $model;
			} else {
				throw new NotFoundHttpException('El Administrador No Existe En La BD!!');
			}
		}
		//Si la actualizaci�n tiene �xito, se devuelve al usuario al index
		public function actionUpdate($id)
		{
			$model = $this->findModel($id);
		
	
			if ($model->load(Yii::$app->request->post())){
			
				if($model->save()){
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
		public function actionCreate()
		{
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
	
	
	
	

	
