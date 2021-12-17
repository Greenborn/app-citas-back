<?php

use yii\db\Migration;

/**
 * Class m211217_071333_create_table_chat_room
 */
class m211217_071333_create_table_chat_room extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('chat_room', [
            'id'               => $this->primaryKey(),
            'user_sender_id'   => $this->integer()->notNull(),
            'user_receiver_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_071333_create_table_chat_room cannot be reverted.\n";

        return false;
    }
}
