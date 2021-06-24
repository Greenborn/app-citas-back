<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class ChangePasswordForm extends Model
{
    public $old_password;
    public $new_password;

    private $_user = true;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // required
            [['old_password', 'new_password'], 'required'],
            // password is validated by validatePassword()
            ['old_password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }

    /**
     * @return bool whether the user change password in successfully
     */
    public function changePassword()
    {
        $this->_user->password = $this->newPassword;
        if( $this->_user->save() ) {
            return true;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}