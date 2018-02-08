<?php

use yii\db\Migration;

/**
 * Class m180120_094311_add_categoryId_column_to_dictionary
 */
class m180120_094311_add_categoryId_column_to_dictionary extends Migration
{
    public function up()
    {
        $this->addColumn('dictionary', 'category_id', $this->integer()->after('description'));
        $this->createIndex(
            'idx-dictionary-category-id',
            'dictionary',
            'category_id'
        );
        $this->addForeignKey(
            'fk-dictionary-category-id',
            'dictionary',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-dictionary-category-id',
            'dictionary'
        );

        $this->dropIndex(
            'idx-dictionary-category-id',
            'dictionary'
        );
        $this->dropColumn('dictionary', 'category_id');
    }
}
