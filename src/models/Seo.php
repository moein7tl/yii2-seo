<?php

namespace moein7tl\yii2SEO\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property integer $id
 * @property string $entity
 * @property string $entity_id
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property string $seo_meta_tags
 */
class Seo extends \yii\db\ActiveRecord
{

    const SCENARIO_TEMPORARY_VALIDATION  =   'TEMPORARY VALIDATION';

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
            [['!entity', '!entity_id','seo_title', 'seo_keywords', 'seo_description', 'seo_meta_tags'], 'string'],
            [['seo_keywords' , 'seo_description', 'seo_meta_tags'], 'string', 'on' => self::SCENARIO_TEMPORARY_VALIDATION],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'entity'            =>  'Entity',
            'entity_id'         =>  'Entity ID',
            'seo_title'         =>  'SEO Title',
            'seo_keywords'      =>  'SEO Keywords',
            'seo_description'   =>  'SEO Description',
            'seo_meta_tags'     =>  'SEO Meta Tags',
        ];
    }
}
