<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m201115_103545_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'surname' => $this->string(150),
            'login' => $this->string(15),
            'pass' => $this->string(255),
            'id_position' => $this->integer(11)->defaultValue(0)
        ]);

        $this->insert('users', [
            'id' => '1',
            'name' => 'Имя (тест)',
            'surname' => 'Фамилия (тест)',
            'login' => 'admin',
            'pass' => '$2y$13$6Ah232KnMfqUBXgAy6ZNjem41QWy/ED9IURwiGqA/jrwjOUvucGHa',
            'id_position' => '1'
        ]);

        $this->insert('users', [
            'id' => '2',
            'name' => 'Тест',
            'surname' => 'Тест',
            'login' => 'test',
            'pass' => '$2y$13$U0EF5CILzprFdpeIT//t2.KBiPbQH93YNGbV2IIQXY4sT/7KBWCPu',
            'id_position' => '1'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
