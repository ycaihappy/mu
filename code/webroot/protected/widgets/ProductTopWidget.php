<?php
class ProductTopWidget extends CWidget
{
    public $type;
    public $newlist;
    public function init()
    {

        switch ($this->type)
        {
        case 'special':
            $this->newlist = Product::model()->topSpecial()->findAll();
            break;
        case 'product':
            $this->newlist = Product::model()->topProduct()->findAll();
            break;
        }
    }

    public function run()
    {
        $this->render('product_top',array('type'=>$this->type, 'data'=>$this->newlist));
    }
}
