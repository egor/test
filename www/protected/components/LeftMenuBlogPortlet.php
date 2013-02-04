<?php
/**
 * Description of LeftMenuBlogPortlet
 *
 * @author egorik <egor.developer@gmail.com>
 */

Yii::import('zii.widgets.CPortlet');

class LeftMenuBlogPortlet extends CPortlet
{
    public function init()
    {
        //$this->title=CHtml::encode(Yii::app()->user->name);
        parent::init();
    }
 
    protected function renderContent()
    {
        $models = Pages::model()->findByPk(85);
        $subModels = Pages::model()->findAll('visibility=:visibility AND level=:level AND in_menu=:in_menu AND root=:root ORDER BY lft', array(':visibility'=>1, ':level'=>2,  ':in_menu'=>1, ':root'=>85));
        $this->render('leftMenuBlogPortlet', array('items' => $subModels, 'main' => $models));
    }
}

?>
