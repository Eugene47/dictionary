<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m180131_142624_add_rules_table
 */
class m180131_142624_add_rules_table extends Migration
{
    public function up()
    {
        $admin = User::find()
            ->where(['username' => 'admin'])
            ->one();
        if (!$admin){
            $params = $this->integer()->notNull();
        }
        else{
            $params = $this->integer()->notNull()->defaultValue($admin->id);
        }

        $this->createTable('rules', [
            'id' => $this->primaryKey(),
            'title' => $this->string(32)->notNull()->unique(),
            'text' => $this->text(),
            'category_id' => $this->integer(),
            'creator_id' => $this->integer(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-rules-category-id',
            'rules',
            'category_id'
        );
        $this->createIndex(
            'idx-rules-creator_id',
            'rules',
            'creator_id'
        );

        $this->addForeignKey(
            'fk-rules-category-id',
            'rules',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-rules-creator_id',
            'rules',
            'creator_id',
            'user',
            'id',
            'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-rules-creator_id',
            'rules'
        );

        $this->dropForeignKey(
            'fk-rules-category-id',
            'rules'
        );

        $this->dropIndex(
            'idx-rules-creator_id',
            'rules'
        );

        $this->dropIndex(
            'idx-rules-category-id',
            'rules'
        );

        $this->dropTable('rules');
    }
}
