<?php

class SMSSetting extends CJsonModel {

	public $uid;
	public $pwd;
	public $registeTemplate;
	public $priceTemplate;
	public $sendor;
	public $system;
	protected $dataPath='data/smssetting.json';
	
}


?>