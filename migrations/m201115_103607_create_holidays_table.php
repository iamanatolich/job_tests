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

        $this->insert('holidays', [
            'id' => '1',
            'date_in' => '2020-11-16',
            'date_out' => '2020-11-23',
            'id_user' => '2',
            'approved' => '0',
        ]);

        $this->insert('holidays', [
            'id' => '1',
            'date_in' => '2020-11-18',
            'date_out' => '2020-11-25',
            'id_user' => '3',
            'approved' => '0',
        ]);

        $this->insert('holidays', [
            'id' => '1',
            'date_in' => '2020-11-14',
            'date_out' => '2020-11-22',
            'id_user' => '2',
            'approved' => '1',
        ]);

        $this->insert('holidays', [
            'id' => '1',
            'date_in' => '2020-11-17',
            'date_out' => '2020-11-24',
            'id_user' => '4',
            'approved' => '0',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%holidays}}');
    }
}
