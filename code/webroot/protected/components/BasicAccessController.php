<?php



class BasicAccessController extends Controller {

	/**
	 * 基础的权限过滤
	 * @see CController::filters()
	 */
	public function filters()
    {
        return array(
            'accessControl',
        );
    }
    public function accessRules()
    {
    	return array(
    			array(
    				'deny',
    				'actions'=>array('view'),
    				'users'=>array('?'),
    			),
    	);
    }

}


?>