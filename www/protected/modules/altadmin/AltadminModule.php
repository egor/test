<?php

class AltadminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'altadmin.models.*',
			'altadmin.components.*',
		));
                Yii::app()->theme = 'altadmin';
                
                $this->setComponents(array(
                    'errorHandler' => array(
                        'errorAction' => 'altadmin/default/error'
                ),
                    'user' => array(
                        'class' => 'CWebUser',
                        'loginUrl' => Yii::app()->createUrl('altadmin/default/login'),
                    )
                ));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
                    if ((Yii::app()->user->isGuest || Yii::app()->user->role!='admin') && Yii::app()->controller->id!='default') {
                        Yii::app()->request->redirect('/altadmin/');
                    }
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
