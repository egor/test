<?php
/* @var $this EditFieldsController */
$this->breadcrumbs = array(
    'Редактируемые поля',
);
if (Yii::app()->user->hasFlash('success')):
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
endif;
?>
<article class="module width_full">
    <header><h3 class="tabs_involved">Редактируемые поля</h3></header>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'edit-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'name' => 'edit_fields',
            'method' => 'post',
        )
            ));
    ?>
    <div class="tab_container">
        <?php
        foreach ($model as $value) {
            echo '<fieldset>';
            echo '<label>' . $value->name . '<br></label>';
            if ($value->f_type == 'area') {
                echo CHtml::textArea($value->id, $value->value);
            } else {
                echo CHtml::textField($value->id, $value->value);
            }
            echo '</fieldset>';
        }
        ?>
    </div>
    <footer>
        <div class="submit_link">
            <?php echo CHtml::submitButton('Отменить'); ?>        
            <?php echo CHtml::submitButton('Сохранить', array('class' => "alt_btn")); ?>
        </div>
    </footer>
    <?php $this->endWidget(); ?>
</article>


