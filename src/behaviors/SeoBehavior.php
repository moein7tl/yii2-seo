<?php
/**
 * Created by IntelliJ IDEA.
 * User: moein
 * Date: 10/18/16
 * Time: 1:00 PM
 */

namespace moein7tl\yii2SEO\behaviors;

use Yii;
use yii\base\Behavior;
use yii\base\ModelEvent;
use yii\db\ActiveRecord;
use moein7tl\yii2SEO\models\Seo;

/**
 * Class SeoBehavior
 * @package moein7tl\yii2SEO\behaviors
 * @property $model Seo
 */
class SeoBehavior extends Behavior {
    public $model;
    public $seo_title;
    public $seo_keywords;
    public $seo_description;
    public $seo_meta_tags;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE =>  'beforeValidate',
            ActiveRecord::EVENT_AFTER_INSERT    =>  'afterInsertOrUpdate',
            ActiveRecord::EVENT_AFTER_UPDATE    =>  'afterInsertOrUpdate',
            ActiveRecord::EVENT_AFTER_DELETE    =>  'afterDelete',
            ActiveRecord::EVENT_AFTER_FIND      =>  'afterFind'
        ];
    }

    /**
     * @param $event ModelEvent
     *
     */
    public function beforeValidate($event)
    {
        $model  =   new Seo();
        $model->setScenario(Seo::SCENARIO_TEMPORARY_VALIDATION);

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
        } else if (Yii::$app->request->isGet) {
            $model->load(Yii::$app->request->get());
        }

        $event->isValid =   $model->validate();
    }

    /**
     * @param $event ModelEvent
     */
    public function afterInsertOrUpdate($event)
    {
        $model              =   $this->getModel();
        $model->attributes  =   $_REQUEST;
        $model->save();
    }

    public function afterDelete()
    {
        $this->getModel()->delete();
    }

    public function afterFind()
    {
        $model                  =   $this->getModel();
        $this->seo_title        =   $model->seo_title;
        $this->seo_description  =   $model->seo_description;
        $this->seo_keywords     =   $model->seo_keywords;
        $this->seo_meta_tags    =   $model->seo_meta_tags;
    }

    /**
     * @return Seo|static
     */
    public function getModel()
    {
        $entity     =   get_class($this->owner);
        $entity_id  =   (string)(($this->owner->isNewRecord)? NULL : $this->owner->getPrimaryKey());

        if (($model = Seo::findOne(['entity' => $entity, 'entity_id' => $entity_id])) === NULL)
        {
            $model              =   new Seo();
            $model->entity      =   $entity;
            $model->entity_id   =   $entity_id;
        }

        return $model;
    }
}