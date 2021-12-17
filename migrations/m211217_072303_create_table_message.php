<?php

use yii\db\Migration;

/**
 * Class m211217_072303_create_table_message
 */
class m211217_072303_create_table_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('message', [
            'id'             => $this->primaryKey(),
            'chat_id'        => $this->integer()->notNull(),
            'user_sender_id' => $this->integer()->notNull(),
            'message'        => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_072303_create_table_message cannot be reverted.\n";

        return false;
    }

}
