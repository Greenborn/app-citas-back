<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matches".
 *
 * @property int $id
 * @property int|null $user_matcher_id
 * @property int|null $user_matched_id
 *
 * @property User $userMatched
 * @property User $userMatcher
 */
class Matches extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matches';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_matcher_id', 'user_matched_id'], 'integer'],
            [['user_matched_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_matched_id' => 'id']],
            [['user_matcher_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_matcher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_matcher_id' => 'User Matcher ID',
            'user_matched_id' => 'User Matched ID',
        ];
    }

    /**
     * Gets query for [[UserMatched]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMatched()
    {
        return $this->hasOne(User::className(), ['id' => 'user_matched_id'])->inverseOf('matches');
    }

    /**
     * Gets query for [[UserMatcher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserMatcher()
    {
        return $this->hasOne(User::className(), ['id' => 'user_matcher_id'])->inverseOf('matches0');
    }
}
