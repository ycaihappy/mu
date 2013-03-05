<?php

class ProductForm extends CFormModel
{
	public $product_name;
	public $product_keyword;
	public $product_type_id;
	public $district;
    public $province;
    public $product_city_id;
    public $product_unit;
    public $product_quanity;
    public $product_price;
    public $product_content;
    public $product_join_date;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('product_name', 'required'),		
            array('product_keyword', 'required'),		
            array('district,province', 'safe'),		
            array('product_type_id', 'required'),		
            array('product_city_id', 'required'),		
            array('product_unit,product_quanity,product_price,product_content, product_join_date', 'safe'),		
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
		);
	}

	public function draft()
	{
        $addsql = "insert into mu_product(product_name, product_user_id,product_type_id,product_keyword,
            product_content,product_status,product_unit,product_price,product_join_date,product_city_id)
            values(:product_name,:product_user_id,:product_type_id,:product_keyword,
            :product_content,:product_status,:product_unit,:product_price,:product_join_date,:product_city_id)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":product_name", $this->product_name, PDO::PARAM_STR);
        $commd->bindValue(":product_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":product_type_id", $this->product_type_id);
        $commd->bindValue(":product_city_id", $this->product_city_id);
        $commd->bindValue(":product_keyword", $this->product_keyword);
        $commd->bindValue(":product_content", $this->product_content);
        $commd->bindValue(":product_price", $this->product_price);
        $commd->bindValue(":product_status", 0);
        $commd->bindValue(":product_unit", $this->product_unit);
        $commd->bindValue(":product_join_date", date('Y-m-d H:i:s'));
        $commd->execute();
	}
}
