<?php
class ProductCategoryWidget extends CWidget
{

	public function init()
	{
	}

	public function run()
	{
		$this->render('product_top',array('type'=>$this->type, 'data'=>$this->newlist,'proTypes'=>$this->proTypes));
	}
}
