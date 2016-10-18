<?php

namespace moein7tl\yii2SEO\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $entity
 * @property string $entity_id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $meta_tags
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity', 'entity_id','title', 'keywords', 'description', 'meta_tags'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity'        =>  'Entity',
            'entity_id'     =>  'Entity ID',
            'title'         =>  'Title',
            'keywords'      =>  'Keywords',
            'description'   =>  'Description',
            'meta_tags'     =>  'Meta Tags',
        ];
    }
}
