<?php
namespace app\actions;

use Yii;
use yii\rest\DeleteAction;
use yii\helpers\Url;
use app\models\ProfileImage;

class DeleteImageAction extends DeleteAction {

    public function run($id) {
      $params = Yii::$app->getRequest()->getBodyParams();

      $response = Yii::$app->getResponse();
      $response->format = \yii\web\Response::FORMAT_JSON;

      $profile_image = ProfileImage::find()->where(['id' => $id])->one();

      if ($profile_image !== null){
        if (!unlink($profile_image->path)) {
            throw new \Exception('No se pudo eliminar el archivo', 1);
        } else {
            if ( $profile_image->delete() ){
              $response->data = [
                'success' => true,
              ];
            } else {
              throw new \Exception( $profile_image->getErrors(), 1);
            }
        }
      }
    }

}
