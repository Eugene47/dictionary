<?php

namespace app\models;

use http\Url;
use Yii;

/**
 * This is the model class for table "dictionary".
 *
 * @property integer $id
 * @property string $word
 * @property string $translate
 * @property string $image
 * @property string $file
 * @property string $description
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $type
 * @property integer $creator_id
 */
class Dictionary extends \yii\db\ActiveRecord
{
    const TYPE_NOUN = 1;
    const TYPE_VERB = 2;
    const TYPE_ADJECTIVE = 3;
    const TYPE_ADVERB = 4;

    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dictionary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['word', 'translate', 'category_id'], 'required'],
            [['category_id', 'type', 'creator_id'], 'integer'],
            [['created_at'], 'safe'],
            [['word', 'translate'], 'string', 'max' => 64],
            [['file'],'file'],
            [['image', 'description'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creator_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'word' => 'Word',
            'translate' => 'Translate',
            'file' => 'Image',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'type' => 'Type',
            'creator_id' => 'Creator',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::className(), ['id' => 'creator_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            if ($this->isNewRecord) {
                $this->created_at = date(\Yii::$app->params['datetime_format']);
                $this->creator_id = \Yii::$app->user->id;
            }

            return true;
        }
        return false;
    }
}
