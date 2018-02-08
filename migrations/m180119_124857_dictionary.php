<?php

use yii\db\Migration;

/**
 * Class m180119_124857_dictionary
 */
class m180119_124857_dictionary extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dictionary', [
            'id' => $this->primaryKey(),
            'word' => $this->string(64)->notNull(),
            'translate' => $this->string(64)->notNull(),
            'image' => $this->string(255),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dictionary');
    }
}
