<?php

use yii\db\Migration;

/**
 * Class m211217_072936_create_table_profile_image
 */
class m211217_072936_create_table_profile_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profile_image', [
            'id'         => $this->primaryKey(),
            'path'       => $this->string()->notNull(),
            'url'        => $this->string()->notNull(),
            'profile_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_072936_create_table_profile_image cannot be reverted.\n";

        return false;
    }

}
