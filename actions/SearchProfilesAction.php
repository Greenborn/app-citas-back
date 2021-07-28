<?php
namespace app\actions;

use Yii;
use yii\rest\CreateAction;
use yii\helpers\Url;
use yii\db\Query;
use app\models\User;
use app\models\Profile;
use app\components\HttpTokenAuth;

class SearchProfilesAction extends CreateAction {

    public function run() {
      $params       = Yii::$app->getRequest()->getBodyParams();
      $lat          = isset($params['lat']) ? $params['lat'] : null;
      $lng          = isset($params['lng']) ? $params['lng'] : null;
      $max_distance = isset($params['max_distance']) ? $params['max_distance'] : null;

      $response         = Yii::$app->getResponse();
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = [
          'status'  => true
      ];

      if ($max_distance === null || !is_numeric($max_distance)){
        $response->data = [
            'status'  => false,
            'message' => 'Se debe especificar un valor de distancia válido!',
        ];
      }

      if ($lat === null || !is_numeric($lat)){
        $response->data = [
            'status'  => false,
            'message' => 'Se debe especificar un valor de latitud válido!',
        ];
      }

      if ($lng === null || !is_numeric($lng)){
        $response->data = [
            'status'  => false,
            'message' => 'Se debe especificar un valor de longitud válido!',
        ];
      }

      $user = $this->modelClass::find()->where( ['access_token' => HttpTokenAuth::getToken()] )->one();
      if ( $user == Null){
        $response->data = [
            'status'  => false,
            'message' => 'Usuario no encontrado!',
        ];
      }

      $profile = Profile::find()->where( ['id' => $user->profile_id] )->one();
      if ( $profile == Null){
        $response->data = [
            'status'  => false,
            'message' => 'Perfil no encontrado!',
        ];
      }

      if ($response->data['status']){
        $connection = Yii::$app->db;
        $command	  =	$connection->createCommand('Select profile.*, user.id as user_id,
          (
              2 * ASIN(
                SQRT(
                  POWER (
                    SIN(
                      (profile.lat - :LAT) * (PI() / 180) / 2
                    ),
                  2)
                  + COS(
                    profile.lat * (PI() / 180)
                  )
                  * COS(
                    :LAT * (PI() / 180)
                  )
                  * POWER(
                    SIN(
                      (profile.lng - :LNG) * (PI()/180) / 2
                    ),
                  2)
                )
              )
          ) * 6378.1 * 1000 AS distance
          FROM user
          INNER JOIN profile ON profile.id=user.profile_id
          HAVING distance < :MAX_DISTANCE
          ');
        $command->bindValue(':LAT', $lat);
        $command->bindValue(':LNG', $lng);
        $command->bindValue(':MAX_DISTANCE', $max_distance);

        $response->data = [
            'status'  => true,
            'data'    => $command->queryAll(),
        ];
      }

    }
}
