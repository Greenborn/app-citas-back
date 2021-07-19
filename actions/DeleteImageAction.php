<?php
namespace app\actions;

use Yii;
use yii\rest\DeleteAction;
use yii\helpers\Url;
use app\models\ProfileImage;

class DeleteImageAction extends DeleteAction {

    public function run($id) {
      $response = Yii::$app->getResponse();
      $response->format = \yii\web\Response::FORMAT_JSON;

      $profile_image = ProfileImage::find()->where(['id' => $id])->one();

      if ($profile_image !== null){
        $transaction = ProfileImage::getDb()->beginTransaction();
        if ( $profile_image->delete() ){

          try {
            if (!unlink($profile_image->path)) {
                $transaction->rollBack();
                throw new \Exception('No se pudo eliminar el archivo', 1);
            } else {
                $response->data = [
                  'success' => true,
                ];
            }
          } catch (\Exception $e) {
              $transaction->rollBack();
              $response->data = [
                'success' => false,
                'message' => $e->getMessage()
              ];
          }

        } else {
          throw new \Exception( $profile_image->getErrors(), 1);
        }

      }
    }

}
