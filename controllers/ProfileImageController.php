<?php
namespace app\controllers;

use yii\rest\ActiveController;


class ProfileImageController extends BaseController {

    public $modelClass = 'app\models\ProfileImage';

    public function actions(){
        $actions = parent::actions();
        $actions['create']['class'] = 'app\actions\CreateImageAction';
        $actions['update']['class'] = 'app\actions\UpdateImageAction';
        $actions['delete']['class'] = 'app\actions\DeleteImageAction';
        return $actions;
    }
}
