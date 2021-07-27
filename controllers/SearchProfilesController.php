<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;

class SearchProfilesController extends BaseController {

    public $modelClass = 'app\models\User';

    public function actions(){
      $actions = parent::actions();
      unset( $actions['delete'],
             $actions['update'],
             $actions['index'],
             $actions['view']
           );

      $actions['create']['class'] = 'app\actions\SearchProfilesAction';
      return $actions;

    }

}
