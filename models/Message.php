<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property int $chat_id
 * @property int|null $user_sender_id
 * @property string|null $message
 *
 * @property Chat-room $chat
 * @property User $userSender
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_id'], 'required'],
            [['chat_id', 'user_sender_id'], 'integer'],
            [['message'], 'string', 'max' => 500],
            [['chat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Chat-room::className(), 'targetAttribute' => ['chat_id' => 'id']],
            [['user_sender_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_sender_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chat_id' => 'Chat ID',
            'user_sender_id' => 'User Sender ID',
            'message' => 'Message',
        ];
    }

    /**
     * Gets query for [[Chat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChat()
    {
        return $this->hasOne(Chat-room::className(), ['id' => 'chat_id'])->inverseOf('messages');
    }

    /**
     * Gets query for [[UserSender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserSender()
    {
        return $this->hasOne(User::className(), ['id' => 'user_sender_id'])->inverseOf('messages');
    }
}
