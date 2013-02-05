<?php

class NewsForm extends CFormModel
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
            array('supply_category,category', 'required'),		
            array('keywords,supply_name', 'required'),		
            array('address', 'required'),		
            array('district,province,city', 'required'),		
            array('tel,price,description,effective_time', 'required'),		
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
        $addsql = "insert into mu_supply(supply_name, supply_user_id,supply_type,supply_keyword,
            supply_category_id,supply_content,supply_address,supply_status,supply_phone,supply_unit,supply_price,supply_valid_date)
            values(:supply_name,:supply_user_id,:supply_type,:supply_keyword,:supply_category_id,
            :supply_content,:supply_address,:supply_status,:supply_phone,:supply_unit,:supply_price,:supply_valid_date)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":supply_name", $this->supply_name, PDO::PARAM_STR);
        $commd->bindValue(":supply_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":supply_type", $this->supply_category);
        $commd->bindValue(":supply_keyword", $this->keywords);
        $commd->bindValue(":supply_category_id", $this->category);
        $commd->bindValue(":supply_content", $this->description);
        $commd->bindValue(":supply_address", $this->address);
        $commd->bindValue(":supply_phone", $this->tel);
        $commd->bindValue(":supply_price", $this->price);
        $commd->bindValue(":supply_status", 0);
        $commd->bindValue(":supply_unit", 0);
        $commd->bindValue(":supply_valid_date", $this->effective_time);
        $commd->execute();
	}
}
