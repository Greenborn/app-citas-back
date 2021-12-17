<?php

use yii\db\Migration;

/**
 * Class m211217_071709_contact_form
 */
class m211217_071709_contact_form extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('contact_form', [
            'id'         => $this->primaryKey(),
            'name'       => $this->string()->notNull(),
            'email'      => $this->string()->notNull(),
            'subject'    => $this->string()->notNull(),
            'body'       => $this->string()->notNull(),
            'verifyCode' => $this->string(),
            'captcha'    => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_071709_contact_form cannot be reverted.\n";

        return false;
    }

}
