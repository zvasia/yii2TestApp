<?php

use yii\db\Migration;
use yii\db\mysql\Schema;

/**
 * Class m200524_232911_db
 */
class m200524_232911_db extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => Schema::TYPE_INTEGER,
            'status' => Schema::TYPE_TINYINT,
            'balance' => Schema::TYPE_INTEGER,
            'full_name' => Schema::TYPE_CHAR,
            'phone' => Schema::TYPE_INTEGER
        ]);

        $this->batchInsert('users', [
            'id',
            'status',
            'balance',
            'full_name',
            'phone'
        ],
            [
                ['2', '0', '10', '345345', '12341234'],
        ['3', '1', '258', 'adfasdf', '12341234'],
        ['4', '1', '258', 'sdfsadf', '12341234'],
            ['5', '1', '258', 'adffgasdf', '12341234'],
            ['6', '1', '23422', 'sdfg', '44444444']
            ]

        );

        $this->createTable('addition', [
            'operation_id' => Schema::TYPE_INTEGER,
            'user_id' => Schema::TYPE_INTEGER,
            'date' => Schema::TYPE_TIMESTAMP,
            'addition_sum' => Schema::TYPE_INTEGER
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200524_232911_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200524_232911_db cannot be reverted.\n";

        return false;
    }
    */
}
