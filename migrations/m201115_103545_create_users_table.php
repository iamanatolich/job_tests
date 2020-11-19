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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
