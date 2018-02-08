<?php

use yii\db\Migration;

/**
 * Class m180122_082140_add_column_created_at
 */
class m180122_082140_add_column_created_at extends Migration
{
    public function up()
    {
        $this->addColumn('dictionary', 'created_at', $this->dateTime()->notNull()->after('category_id'));
    }

    public function down()
    {
        $this->dropColumn('dictionary', 'created_at');
    }
}
