<?php

class BackendModule extends CWebModule
{
	public function init()
	{
	
	Yii::app()->theme = 'techmania1'; 
	$this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'backend/default/error'),
            'user' => array(
                'class' => 'CWebUser',             
                'loginUrl' => Yii::app()->createUrl('backend/default/login'),
            )
        ));
 
Yii::app()->user->setStateKeyPrefix('_backend');
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'backend.models.*',
			'backend.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
		 $route = $controller->id . '/' . $action->id;
		 $publicPages = array(
                'default/login',
                'default/error',
            );
			// this method is called before any module controller action is performed
			// you may place customized code here
			//$controller->layout = 'main';
			if (Yii::app()->user->isGuest && !in_array($route, $publicPages)){            
                Yii::app()->getModule('backend')->user->loginRequired();                
            }
            else
						{
                return true;
								}
		}
		else
			return false;
	}
}
