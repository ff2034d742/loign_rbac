<?php

namespace frontend\controllers;

use Yii;
use frontend\models\profile;
use frontend\models\search\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelpers;


/**
 * ProfileController implements the CRUD actions for profile model.
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    /*public function behaviors()
    {
        return [
        'access' => [
        'class' => \yii\filters\AccessControl::className(),
        'only' => ['index', 'view','create', 'update', 'delete'],
        'rules' => [
        [
        'actions' => ['index', 'view','create', 'update', 'delete'],
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
    }*/
    public function behaviors()
    {
        return [
        'access' => [
        'class' => \yii\filters\AccessControl::className(),
        'only' => ['index'],
        'rules' => [
        [
        'actions' => ['index'],
        'allow' => true,
        'roles' => ['@'],
        'matchCallback' => function ($rule, $action) {
        return PermissionHelpers::requireStatus('Active');
        }
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

    /**
     * Lists all profile models.
     * @return mixed
     */
    // public function actionIndex()
    // {
    //     $searchModel = new ProfileSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     return $this->render('index', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }


    public function actionIndex()
    {
        if ($already_exists = RecordHelpers::userHas('profile')) {
        return $this->render('view', [
        'model' => $this->findModel($already_exists),
        ]);
        } else {
        return $this->redirect(['create']);
        }
    }

    /**
     * Displays a single profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    public function actionView()
    {
        if ($already_exists = RecordHelpers::userHas('profile')) {
        return $this->render('view', [
        'model' => $this->findModel($already_exists),
        ]);
        } else {
        return $this->redirect(['create']);
        }
    }


    /**
     * Creates a new profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new profile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    public function actionCreate()
    {
        $model = new Profile;
        $model->user_id = \Yii::$app->user->identity->id;
        if ($already_exists = RecordHelpers::userHas('profile')) {
        return $this->render('view', [
        'model' => $this->findModel($already_exists),
        ]);
        } elseif ($model->load(Yii::$app->request->post()) && $model->save()){
        return $this->redirect(['view']);
        } else {
        return $this->render('create', [
        'model' => $model,
        ]);
        }
    }


    /**
     * Updates an existing profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/


    public function actionUpdate()
    {
        PermissionHelpers::requireUpgradeTo('Free');
        if($model = Profile::find()->where(['user_id' =>
        Yii::$app->user->identity->id])->one()) {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view']);
        } else {
        return $this->render('update', [
        'model' => $model,
        ]);
        }
        } else {
        throw new NotFoundHttpException('No tiene creado su Perfil.');
        }
    }

    /**
     * Deletes an existing profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    public function actionDelete()
    {
        $model = Profile::find()->where(['user_id' => Yii::$app->user->id])->one();
        $this->findModel($model->id)->delete();
        return $this->redirect(['site/index']);
    }

    
    /**
     * Finds the profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
