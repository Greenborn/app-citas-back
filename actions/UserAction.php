<?php
namespace app\actions;

use Yii;
use yii\rest\CreateAction;
use yii\helpers\Url;
use app\models\User;
use app\models\Profile;

class UserAction extends CreateAction {

    public function run() {
      $params = Yii::$app->getRequest()->getBodyParams();
      $username = isset($params['username']) ? $params['username'] : null;

      $response = Yii::$app->getResponse();
      $response->format = \yii\web\Response::FORMAT_JSON;

      $stored = User::find()->where( ['username' => $username] )->one();
      if ($stored){
        $response->data = [
            'status' => false,
            'message' => 'The username already exists'
        ];
      } else{
        $role_id = isset($params['role_id']) ? $params['role_id'] : null;
        $password = isset($params['password']) ? $params['password'] : null;
        $user = new User();
        $user->username = $username;
        $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);

        $randomStr = Yii::$app->getSecurity()->generateRandomString();
        $user->access_token =  Yii::$app->getSecurity()->generatePasswordHash($password . $randomStr);
        $user->id = 0;
        $user->state_id = 1;
        $user->role_id = $role_id;

        $transaction = User::getDb()->beginTransaction();

        if ($user->save()){
            $profile = new Profile();
            $profile->id= $user->id;
            $birth_date = isset($params['birth_date']) ? $params['birth_date'] : null;
            $description = isset($params['description']) ? $params['description'] : null;
            $email = isset($params['email']) ? $params['email'] : null;
            $gender_id = isset($params['gender_id']) ? $params['gender_id'] : null;
            $gender_preference_id = isset($params['gender_preference_id']) ? $params['gender_preference_id'] : null;
            $default_profile_image_id = isset($params['default_profile_image_id']) ? $params['default_profile_image_id'] : null;
            $profile->birth_date = $birth_date;
            $profile->description = $description;
            $profile->email = $email;
            $profile->gender_id = $gender_id;
            $profile->gender_preference_id = $gender_preference_id;
            $profile->default_profile_image_id = $default_profile_image_id;
            
            $transaction1 = Profile::getDb()->beginTransaction();

            if($profile->save()){
                $transaction->commit();
                $transaction1->commit();
                $response->data = [
                    'status' => true,
                    'username' => $user->username,
                    'id' => $user->id,
                    'profile' => $profile->id,
                    'message' => 'User created!'
                  ];
            };
        } else{
          $transaction->rollBack();
          $transaction1->rollBack();
          $response->data = [
            'status' => false,
            'message' => 'User not created! There is some error!'
          ];
        }

      }
  }
}
