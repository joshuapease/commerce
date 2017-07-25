<?php

namespace craft\commerce\migrations;

use craft\commerce\records\Gateway;
use craft\db\Migration;

/**
 * m170718_150000_paymentmethod_class_to_type
 */
class m170718_150000_paymentmethod_class_to_type extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): bool
    {
        $this->renameColumn(Gateway::tableName(), 'class', 'type');

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m170718_150000_paymentmethod_class_to_type cannot be reverted.\n";


        return false;
    }
}
