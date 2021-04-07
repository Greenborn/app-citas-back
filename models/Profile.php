<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $birth_date
 * @property string|null $description
 * @property string|null $email
 * @property string|null $image_src
 * @property int|null $gender_id
 * @property int $gender_preference_id
 *
 * @property Gender $gender
 * @property Gender $genderPreference
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_id', 'gender_preference_id'], 'integer'],
            [['gender_preference_id'], 'required'],
            [['birth_date'], 'string', 'max' => 15],
            [['description', 'email'], 'string', 'max' => 255],
            [['image_src'], 'string', 'max' => 500],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['gender_preference_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_preference_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'birth_date' => 'Birth Date',
            'description' => 'Description',
            'email' => 'Email',
            'image_src' => 'Image Src',
            'gender_id' => 'Gender ID',
            'gender_preference_id' => 'Gender Preference ID',
        ];
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id'])->inverseOf('profiles');
    }

    /**
     * Gets query for [[GenderPreference]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenderPreference()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_preference_id'])->inverseOf('profiles0');
    }
}
