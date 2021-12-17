<?php

use yii\db\Migration;

/**
 * Class m211217_073114_create_table_role
 */
class m211217_073114_create_table_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('role', [
            'id'         => $this->primaryKey(),
            'type'       => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_073114_create_table_role cannot be reverted.\n";

        return false;
    }
}
