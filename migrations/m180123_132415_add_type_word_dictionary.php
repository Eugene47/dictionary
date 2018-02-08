<?php

use yii\db\Migration;

/**
 * Class m180123_132415_add_type_word_dictionary
 */
class m180123_132415_add_type_word_dictionary extends Migration
{
    public function up()
    {
        $this->addColumn('dictionary', 'type', $this->integer(10)->after('category_id'));
    }

    public function down()
    {
        $this->dropColumn('dictionary', 'type');
    }
}
