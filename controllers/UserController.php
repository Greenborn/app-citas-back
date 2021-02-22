<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }



    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionUpdatePass()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [
          'result' => true
        ];
        return $out;
    }


    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [
          'result' => true
        ];
        return $out;
    }

    public function actionUpdate()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [
          'result' => true
        ];
        return $out;
    }

    public function actionBan()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [
          'result' => true
        ];
        return $out;
    }

    public function actionLogin()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [
          'result' => true,
          'user_profile_data' => [
            "email" => "test.coode@gmail.com",
            "name"  => "Marga Perez",
            "sex"   =>  1,
            "i_find" => 2,
            "birth_date" => "2001-02-22T20:35:41.846Z",
            "description" => "s unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ",
            "user_role" => 0,
            "profile_img_src" => "/assets/imgs/37657364576345.jpg"
          ],
        ];
        return $out;
    }


}
