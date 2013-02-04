<?php
/**
 * Description of LeftMenuBlogPortlet
 *
 * @author egorik <egor.developer@gmail.com>
 */

Yii::import('zii.widgets.CPortlet');

class LeftMenuLastStatPortlet extends CPortlet
{
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        $count = EditFields::model()->findByPk(45);
        $subModels = Pages::model()->findAll('visibility=:visibility AND in_last=:in_last ORDER BY date DESC LIMIT '.$count->value.'', array(':visibility'=>1, ':in_last'=>1));
        $this->render('leftMenuLastStatPortlet', array('items' => $subModels));
    }
}

?>
