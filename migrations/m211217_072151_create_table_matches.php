<?php

use yii\db\Migration;

/**
 * Class m211217_072151_create_table_matches
 */
class m211217_072151_create_table_matches extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('matches', [
            'id'              => $this->primaryKey(),
            'user_matcher_id' => $this->integer()->notNull(),
            'user_matched_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_072151_create_table_matches cannot be reverted.\n";

        return false;
    }
}
