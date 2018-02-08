<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m180123_144418_add_creator_id_to_dictionary
 */
class m180123_144418_add_creator_id_to_dictionary extends Migration
{
    public function up()
    {
        /* @var User $admin */
        $admin = User::find()
            ->where(['username' => 'admin'])
            ->one();

        if (!$admin){
            $params = $this->integer()->notNull()->after('type');
        }
        else{
            $params = $this->integer()->notNull()->defaultValue($admin->id)->after('type');
        }

        $this->addColumn('dictionary', 'creator_id', $params);
        $this->createIndex('idx-dictionary-creator_id','dictionary', 'creator_id');
        $this->addForeignKey('fk-dictionary-creator_id','dictionary','creator_id', 'user', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-dictionary-creator_id',
            'dictionary'
        );

        $this->dropIndex(
            'idx-dictionary-creator_id',
            'dictionary'
        );
        $this->dropColumn('dictionary', 'creator_id');
    }
}
