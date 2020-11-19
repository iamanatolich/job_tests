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
            'pass' => '$2y$13$mfYsEoBRcOBzlbQp3.CmPuEI/ZfPSyJ..gsUmG.Mwo6ftzqL8.XUG', //root
            'id_position' => '1'
        ]);

        $this->insert('users', [
            'id' => '2',
            'name' => 'Тест',
            'surname' => 'Тест',
            'login' => 'test',
            'pass' => '$2y$13$U0EF5CILzprFdpeIT//t2.KBiPbQH93YNGbV2IIQXY4sT/7KBWCPu', //test
            'id_position' => '0'
        ]);

        $this->insert('users', [
            'id' => '3',
            'name' => 'Тест1',
            'surname' => 'Тест1',
            'login' => 'test1',
            'pass' => '$2y$13$BuPN5SlV.i72y2sMeNAe/erGsRu/sIjOvDkG08/25OWxbVwO.9cKm', //test1
            'id_position' => '0'
        ]);

        $this->insert('users', [
            'id' => '4',
            'name' => 'Тест2',
            'surname' => 'Тест2',
            'login' => 'test2',
            'pass' => '$2y$13$1/4tWN/xDCn1US8Za9kk0.QH3iTup3I6jRX9pzKRLGxExwDbc0LqC', //test2
            'id_position' => '0'
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
