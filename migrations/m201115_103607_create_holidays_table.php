<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%holidays}}`.
 */
class m201115_103607_create_holidays_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%holidays}}', [
            'id' => $this->primaryKey(),
            'date_in' => $this->date(),
            'date_out' => $this->date(),
            'id_user' => $this->integer(11),
            'approved' => $this->tinyInteger(1)->defaultValue(0)
        ]);

        $this->createIndex(
            'holidays_id_user',
            'holidays',
            'id_user'
        );

        $this->addForeignKey(
            'holidays_id_user',
            'holidays',
            'id_user',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%holidays}}');
    }
}
