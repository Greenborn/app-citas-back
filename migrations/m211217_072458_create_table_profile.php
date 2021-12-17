<?php

use yii\db\Migration;

/**
 * Class m211217_072458_create_table_profile
 */
class m211217_072458_create_table_profile extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profile', [
            'id'                       => $this->primaryKey(),
            'birth_date'               => $this->string()->notNull(),
            'description'              => $this->string()->notNull(),
            'email'                    => $this->string()->notNull(),
            'image_src'                => $this->string()->notNull(),
            'gender_id'                => $this->integer()->notNull(),
            'gender_preference_id'     => $this->integer()->notNull(),
            'default_profile_image_id' => $this->integer()->notNull(),
            'lat'                      => $this->string()->notNull(),
            'lng'                      => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_072458_create_table_profile cannot be reverted.\n";

        return false;
    }

}
