<?php
namespace app\actions;

use Yii;
use yii\rest\UpdateAction;
use yii\helpers\Url;
use app\models\User;
use app\models\Profile;

class UpdateProfileAction extends UpdateAction {

    public function run($id) {
      $params = Yii::$app->getRequest()->getBodyParams();
      $profile = Profile::find()->where(['id' => $id])->one();

      $birth_date = isset($params['birth_date']) ? $params['birth_date'] : $profile->birth_date;
      $description = isset($params['description']) ? $params['description'] : $profile->description;
      $email = isset($params['email']) ? $params['email'] : $profile->email;
      $image_src = isset($params['image_src']) ? $params['image_src'] : $profile->image_src;
      $gender_id = isset($params['gender_id']) ? $params['gender_id'] : $profile->gender_id;
      $gender_preference_id = isset($params['gender_preference_id']) ? $params['gender_preference_id'] : $profile->gender_preference_id;
      $default_profile_image_id = isset($params['default_profile_image_id']) ? $params['default_profile_image_id'] : $profile->default_profile_image_id;
      $lat = isset($params['lat']) ? $params['lat'] : $profile->lat;
      $lng = isset($params['lng']) ? $params['lng'] : $profile->lng;

      $response = Yii::$app->getResponse();
      $response->format = \yii\web\Response::FORMAT_JSON;

      if ($profile){
            $profile->birth_date               = $birth_date;
            $profile->description              = $description;
            $profile->email                    = $email;
            $profile->image_src                = $image_src;
            $profile->gender_id                = $gender_id;
            $profile->gender_preference_id     = $gender_preference_id;
            $profile->default_profile_image_id = $default_profile_image_id;
            $profile->lat                      = $lat;
            $profile->lng                      = $lng;

          if ($profile->save()){
              $response->data = [
                'id' => $profile->id,
              ];
          } else {
              $response->data = [
                'status'  => false,
                'message' => 'Perfil no actualizado! Hay un error!',
              ];
          }
      }
    }

}
