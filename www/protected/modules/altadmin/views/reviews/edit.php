

             
<script type="text/javascript" src="/library/altadmin/editor/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="/js/altadmin/includeEditor.js"></script>

<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
    'Отзывы клиентов'=>array('/altadmin/reviews/'),
    'Редактирование',
);
?>
<?php if(Yii::app()->user->hasFlash('success')):
        echo '<h4 class="alert_success">'.Yii::app()->user->getFlash('success').'</h4>'; 
endif; ?>
<article class="module width_full">
			<header><h3>Редактирование новости</h3></header>
				<div class="module_content">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-data-_form-form',
        'enableAjaxValidation' => false,
            ));
    ?>
    <?php
    
    echo $form->errorSummary($model);
    
    ?>
<fieldset>
               <?php echo $form->labelEx($model, 'visibility'); ?>
                            <?php echo $form->checkBox($model, 'visibility'); ?>
                            <?php echo $form->error($model, 'visibility'); ?>
                            </fieldset>
                            
                                <fieldset>
                        
                            <?php echo $form->labelEx($model, 'menu_name'); ?>
                            <?php echo $form->textField($model, 'menu_name'); ?>
                            <?php echo $form->error($model, 'menu_name'); ?>
                            <div class="clear"></div>
                        </fieldset>
                                    
                                
                             <fieldset>   
                            <?php echo $form->labelEx($model, 'text'); ?>
                                <br /><br />
                            <?php echo $form->textArea($model, 'text', array('id'=>'editor-text')); ?>
                                <br /><br />
                            <?php echo $form->error($model, 'text'); ?>
                           </fieldset>
    
                       <fieldset>
                        
                            <?php echo $form->labelEx($model, 'link_to_video'); ?>
                            <?php echo $form->textField($model, 'link_to_video'); ?>
                            <?php echo $form->error($model, 'link_to_video'); ?>
                            <div class="clear"></div>
                        </fieldset>
                       <fieldset>
                        
                            <?php echo $form->labelEx($model, 'user_address'); ?>
                            <?php echo $form->textField($model, 'user_address'); ?>
                            <?php echo $form->error($model, 'user_address'); ?>
                            <div class="clear"></div>
                        </fieldset>

                                                            
                            
                            

                            
                        
</div>
			<footer>
				<div class="submit_link">
        <?php echo CHtml::submitButton('Отменить'); ?>
        <?php echo CHtml::submitButton('Сохранить'); ?>
        <?php echo CHtml::submitButton('Сохранить и выйти', array('class'=>"alt_btn")); ?>
				</div>
			</footer>
		</article><!-- end of post new article -->
		
    

    <?php $this->endWidget(); ?>