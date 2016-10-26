<?php
/**
 * Created by IntelliJ IDEA.
 * User: moein
 * Date: 10/26/16
 * Time: 11:19 AM
 */

namespace moein7tl\yii2SEO\behaviors;

trait SeoTrait {
    public function fields()
    {
        $fields =    parent::fields();

        $fields['seo_title']    =   function (){
            return $this->seo_title;
        };

        $fields['seo_keywords']    =   function (){
            return $this->seo_keywords;
        };

        $fields['seo_description']    =   function (){
            return $this->seo_description;
        };

        $fields['seo_meta_tags']    =   function (){
            return $this->seo_meta_tags;
        };

        return $fields;
    }
}