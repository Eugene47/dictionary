<?php

use yii\db\Migration;

/**
 * Class m180119_192228_add_field_description
 */
class m180119_192228_add_field_description extends Migration
{
    public function up()
    {
        $this->addColumn('dictionary', 'description', $this->string('255')->after('image'));
    }

    public function down()
    {
        $this->dropColumn('dictionary', 'description');
    }
}
