<?php
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
            $deleted_status = unlink($profile_image->path);
          } catch (\Exception $e) {
              $transaction->rollBack();
              $response->data = [
                'success' => false,
                'message' => $e->getMessage()
              ];
          }

          if ($deleted_status){
            $transaction->commit();
            $response->data = [
              'success' => true,
            ];
          }

        } else {
          $response->data = [
            'success' => false,
            'message' => $profile_image->getErrors()
          ];
        }

      }
    }

}
