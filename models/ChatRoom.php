<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat_room".
 *
 * @property int $id
 * @property int|null $user_sender_id
 * @property int|null $user_receiver_id
 *
 * @property User $userReceiver
 * @property User $userSender
 * @property Message[] $messages
 */
class ChatRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_sender_id', 'user_receiver_id'], 'integer'],
            [['user_receiver_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_receiver_id' => 'id']],
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
            'user_sender_id' => 'User Sender ID',
            'user_receiver_id' => 'User Receiver ID',
        ];
    }

    /**
     * Gets query for [[UserReceiver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserReceiver()
    {
        return $this->hasOne(User::className(), ['id' => 'user_receiver_id'])->inverseOf('chatRooms');
    }

    /**
     * Gets query for [[UserSender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserSender()
    {
        return $this->hasOne(User::className(), ['id' => 'user_sender_id'])->inverseOf('chatRooms0');
    }

    /**
     * Gets query for [[Messages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['chat_id' => 'id'])->inverseOf('chat');
    }
}
