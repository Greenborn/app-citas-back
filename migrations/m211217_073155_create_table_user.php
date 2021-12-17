<?php

use yii\db\Migration;

/**
 * Class m211217_073155_create_table_user
 */
class m211217_073155_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string()->notNull(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->notNull(),
            'access_token'         => $this->string()->notNull(),
            'state_id'             => $this->integer()->notNull(),
            'online'               => $this->integer()->notNull(),
            'created_at'           => $this->string(),
            'updated_at'           => $this->string(),
            'role_id'              => $this->integer()->notNull(),
            'profile_id'           => $this->integer()->notNull(),
            'verification_email'   => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_073155_create_table_user cannot be reverted.\n";

        return false;
    }
}
