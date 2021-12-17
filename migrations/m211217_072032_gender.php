<?php

use yii\db\Migration;

/**
 * Class m211217_072032_gender
 */
class m211217_072032_gender extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gender', [
            'id'         => $this->primaryKey(),
            'type'       => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_072032_gender cannot be reverted.\n";

        return false;
    }
}
