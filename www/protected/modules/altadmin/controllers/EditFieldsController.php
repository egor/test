<?php

class EditFieldsController extends Controller
{
	public function actionIndex()
	{

            if (isset($_POST['yt1'])) {
                $model = EditFields::model()->findAll();
                foreach ($model as $value) {
                    //echo $value->key; die;
                    EditFields::model()->updateByPk($value->id,array('value'=>$_POST[$value->id]));
                    //$model->value = $_POST[$value->key];
                    //$model->save();
                }
            }
            $model = EditFields::model()->findAll();            
            $this->render('index', array ('model' => $model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}