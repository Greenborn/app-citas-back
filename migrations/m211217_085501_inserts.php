<?php

use yii\db\Migration;

/**
 * Class m211217_085501_inserts
 */
class m211217_085501_inserts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //Roles
        $this->insert('role',
            [
                'id'    => 1,
                'type'  => 'Administrador',
            ]);

        $this->insert('role',
            [
                'id'    => 2,
                'type'  => 'Usuario',
            ]);

        //Usuarios
        $this->insert('user',
            [
                'id'                   => 1,
                'username'             => 'admin',
                'password_hash'        => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'password_reset_token' => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'access_token'         => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'state_id'             => 1,
                'online'               => 0,
                'created_at'           => '',
                'updated_at'           => '',
                'role_id'              => 1,
                'profile_id'           => 1,
                'verification_email'   => 1,
            ]);

        $this->insert('user',
            [
                'id'                   => 2,
                'username'             => 'test1',
                'password_hash'        => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'password_reset_token' => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'access_token'         => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'state_id'             => 1,
                'online'               => 0,
                'created_at'           => '',
                'updated_at'           => '',
                'role_id'              => 2,
                'profile_id'           => 2,
                'verification_email'   => 1,
            ]);

        $this->insert('user',
            [
                'id'                   => 3,
                'username'             => 'test3',
                'password_hash'        => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'password_reset_token' => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'access_token'         => '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm',
                'state_id'             => 1,
                'online'               => 0,
                'created_at'           => '',
                'updated_at'           => '',
                'role_id'              => 2,
                'profile_id'           => 2,
                'verification_email'   => 1,
            ]);

        //Perfiles
        $this->insert('profile',
            [
                'id'                       => 1,
                'birth_date'               => '1990-01-01 10:00:00',
                'description'              => 'El todo poderoso admin',
                'email'                    => 'admin@greenborn.com.ar',
                'image_src'                => '',
                'gender_id'                => 1,
                'gender_preference_id'     => 2,
                'default_profile_image_id' => 1,
                'lat'                      => '',
                'lng'                      => '',
            ]);

        $this->insert('profile',
            [
                'id'                       => 2,
                'birth_date'               => '1990-01-01 10:00:00',
                'description'              => 'test 1',
                'email'                    => 'admin@greenborn.com.ar',
                'image_src'                => '',
                'gender_id'                => 1,
                'gender_preference_id'     => 2,
                'default_profile_image_id' => 2,
                'lat'                      => '',
                'lng'                      => '',
            ]);

        $this->insert('profile',
            [
                'id'                       => 3,
                'birth_date'               => '1990-01-01 10:00:00',
                'description'              => 'test 3',
                'email'                    => 'admin@greenborn.com.ar',
                'image_src'                => '',
                'gender_id'                => 2,
                'gender_preference_id'     => 1,
                'default_profile_image_id' => 3,
                'lat'                      => '',
                'lng'                      => '',
            ]);

        //Genero
        $this->insert('gender',
            [
                'id'   => 1,
                'type' => 'Hombre',
            ]);

        $this->insert('gender',
            [
                'id'   => 2,
                'type' => 'Mujer',
            ]);

        //IMAGEN DE PERFIL
        $this->insert('profile_image',
            [
                'id'         => 1,
                'path'       => '',
                'url'        => '',
                'profile_id' => 1,
            ]);

        $this->insert('profile_image',
            [
                'id'         => 2,
                'path'       => '',
                'url'        => '',
                'profile_id' => 2,
            ]);

        $this->insert('profile_image',
            [
                'id'         => 3,
                'path'       => '',
                'url'        => '',
                'profile_id' => 3,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211217_085501_inserts cannot be reverted.\n";

        return false;
    }
}
