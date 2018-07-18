<?php

namespace app\controllers;

use Yii;
use app\models\Categoria;
use app\models\CategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoriaController implements the CRUD actions for Categoria model.
 */
class CategoriaController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categoria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categoria model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categoria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categoria();

        if ($model->load(Yii::$app->request->post())) {
			$model->save();
			$productoId = $model->cat_nombre;
			$image= UploadedFile::getInstance($model,'cat_imagen');
			if(isset($image)){
				$imgName='cat_'. $productoId . '.'.$image->getExtension();
				$image->saveAs(Yii::getAlias('@categoriaImgPath')."/".$imgName);
			}else{
				$imgName='cat_'. $productoId ;
			}
			
			
			$model->cat_imagen = $imgName;
			$model->save();

			
			
			
            return $this->redirect(['view', 'id' => $model->cat_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Categoria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model = $this->findModel($id);
		$oldImage = $model->cat_imagen;
		$productoId = $model->cat_nombre;
		
        if ($model->load(Yii::$app->request->post())) {
			$image= UploadedFile::getInstance($model,'cat_imagen');
			    if(isset($image)){
				$imgName='cat_'. $productoId . '.'.$image->getExtension();
				$model->cat_imagen = $imgName;
				} else {
					$model->cat_imagen = $oldImage;
				}
				if($model->save())
				{
					if(isset($image)){
					$imgName='cat_'. $productoId . '.'.$image->getExtension();
					$image->saveAs(Yii::getAlias('@categoriaImgPath')."/".$imgName);  
					}
				}
			
			
			
			
            return $this->redirect(['view', 'id' => $model->cat_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Categoria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categoria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categoria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categoria::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
