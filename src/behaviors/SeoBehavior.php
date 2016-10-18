<?php
/**
 * Created by IntelliJ IDEA.
 * User: moein
 * Date: 10/18/16
 * Time: 1:00 PM
 */

namespace moein7tl\yii2SEO\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use moein7tl\yii2SEO\models\Seo;

class SeoBehavior extends Behavior {
    public $seo_title;
    public $seo_keywords;
    public $seo_description;
    public $seo_meta_tags;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE =>  'validate',
            ActiveRecord::EVENT_AFTER_INSERT    =>  'insert',
            ActiveRecord::EVENT_AFTER_UPDATE    =>  'update',
            ActiveRecord::EVENT_AFTER_DELETE    =>  'delete'
        ];
    }

    public function validate()
    {

    }

    public function insert()
    {

    }


    public function update()
    {

    }

    public function delete()
    {
        $this->getModel()->delete();
    }

    public function getModel()
    {
        $entity     =   get_class($this->owner);
        $entity_id  =   $this->owner->getPrimaryKey();

        if (($model = Seo::findOne(['entity' => $entity, 'entity_id' => $entity_id])) === NULL)
        {
            $model              =   new Seo();
            $model->entity      =   $entity;
            $model->entity_id   =   $entity_id;
            $model->save();
        }

        return $model;
    }
}