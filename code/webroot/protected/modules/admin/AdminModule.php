<?php

class AdminModule extends CWebModule
{
	public function init()
	{
	 // this method is called when the module is being created
	 // you may place code here to customize the module or the application
         parent::init();//这步是调用main.php里的配置文件
	// import the module-level models and componen
	$this->setImport(array(
		'admin.models.*',
		'admin.components.*',
	));
        //这里重写父类里的组件
        //如有需要还可以参考API添加相应组件
           Yii::app()->setComponents(array(
                   'errorHandler'=>array(
                           'class'=>'CErrorHandler',
                           'errorAction'=>'admin/default/error',
                   ),
                   'admin'=>array(
                           'class'=>'AdminWebUser',//后台登录类实例
                           'stateKeyPrefix'=>'admin',//后台session前缀
                           'loginUrl'=>Yii::app()->createUrl('admin/site/login'),
                   ),
           ), false);
           //下面这两行我一直没搞定啥意思，貌似CWebModule里也没generatorPaths属性和findGenerators()方法
           //$this->generatorPaths[]='admin.generators';
           //$this->controllerMap=$this->findGenerators();
	}
    public function beforeControllerAction($controller, $action){
            if(parent::beforeControllerAction($controller, $action)){
                $route=$controller->id.'/'.$action->id;
                if(!$this->allowIp(Yii::app()->request->userHostAddress) && $route!=='default/error')
                        throw new CHttpException(403,"You are not allowed to access this page.");
                $publicPages=array(
                        'site/login',
                        'default/error',
                );
                if(Yii::app()->admin->isGuest && !in_array($route,$publicPages))
                        Yii::app()->admin->loginRequired();
                else
                        return true;
            }
            return false;
        }
       protected function allowIp($ip)
        {
                if(empty($this->ipFilters))
                        return true;
                foreach($this->ipFilters as $filter)
                {
                        if($filter==='*' || $filter===$ip || (($pos=strpos($filter,'*'))!==false && !strncmp($ip,$filter,$pos)))
                                return true;
                }
                return false;
        }
}
?>