<?php
class SiteDescription extends CJsonModel {


	public $basicDescription;
	public $agrementDescription;
	public $copyrightDescription;
	protected $dataPath='data/siteDescription.json';

	public function rules()
	{
		return array(
			array('basicDescription,agrementDescription,copyrightDescription','safe'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		);
	}
}


?>