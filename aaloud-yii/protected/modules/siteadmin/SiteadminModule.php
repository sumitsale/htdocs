<?php

class SiteadminModule extends CWebModule
{
	public function init()
	{
		Yii::app()->theme = 'siteadmin'; 
		

			$this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'siteadmin/default/error'),
            'user' => array(
                'class' => 'CWebUser',             
                'loginUrl' => Yii::app()->createUrl('siteadmin/default/login'),
            )
        ));
 
			Yii::app()->user->setStateKeyPrefix('_siteadmin');
		
		

		
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'siteadmin.models.*',
			'siteadmin.components.*',
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
			
			
			if (Yii::app()->user->isGuest && !in_array($route, $publicPages)){            
                Yii::app()->getModule('siteadmin')->user->loginRequired();                
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
