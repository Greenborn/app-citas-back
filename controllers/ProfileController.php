<?php
namespace app\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

use app\modules\v1\models\Profile;


class ProfileController extends BaseController {

    public $modelClass = 'app\models\Profile';

    public function actions(){
        $actions = parent::actions();
        $actions['create']['class'] = 'app\actions\UserAction';
        $actions['update']['class'] = 'app\actions\UpdateUserAction';
        return $actions;
    } 
      
    public function actionIndex() {
       return new ActiveDataProvider([
         'query' => User::find(),
       ]);
    }

}
