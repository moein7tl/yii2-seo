# yii2-seo
This package helps you to implement seo params for entities in your project easier

## Installation

```
php composer.phar require "moein7tl/yii2-seo:dev-master" 
```

or add

```json
"moein7tl/yii2-seo": "dev-master,
```

## Use Seo behavior and trait in each models which needs seo, e.g: post

```
class Post extends ActiveRecord
{
    use SeoTrait;
    
        
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class'     =>  SeoBehavior::className()
            ]
        ];
    }
}
```