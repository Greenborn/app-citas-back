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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_073155_create_table_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211217_073155_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
