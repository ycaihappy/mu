<?php

class SupplyForm extends CFormModel
{
    public $supply_id;
	public $supply_category;
	public $supply_name;
	public $supply_keyword;
	public $category;
	public $district;
    public $city;
    public $address;
    public $unit;
    public $tel;
    public $price;
    public $muContent;
    public $waterContent;
    public $description;
    public $effective_time;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
            array('supply_category,address,city,category,muContent,supply_keyword,supply_name,tel,price,description', 'required'),		
            	
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
        $addsql = "insert into mu_supply(supply_city_id,supply_mu_content,supply_water_content,supply_name, supply_user_id,supply_type,supply_keyword,
            supply_category_id,supply_content,supply_address,supply_status,supply_phone,supply_unit,supply_price,supply_valid_date)
            values(:supply_city,:muContent,:waterContent,:supply_name,:supply_user_id,:supply_type,:supply_keyword,:supply_category_id,
            :supply_content,:supply_address,:supply_status,:supply_phone,:supply_unit,:supply_price,:supply_valid_date)";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":supply_name", $this->supply_name, PDO::PARAM_STR);
        $commd->bindValue(":supply_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":supply_type", $this->supply_category);
        $commd->bindValue(":supply_keyword", $this->supply_keyword);
        $commd->bindValue(":supply_category_id", $this->category);
        $commd->bindValue(":supply_content", $this->description);
        $commd->bindValue(":supply_address", $this->address);
        $commd->bindValue(":supply_city", $this->city);
        $commd->bindValue(":muContent", $this->muContent);
        $commd->bindValue(":waterContent", $this->waterContent);
        $commd->bindValue(":supply_phone", $this->tel);
        $commd->bindValue(":supply_price", $this->price);
        $commd->bindValue(":supply_status", 33);
        $commd->bindValue(":supply_unit",$this->unit);
        $commd->bindValue(":supply_valid_date", date('Y-m-d H:i:s'));
        $commd->execute();
	}

    public function update()
    {
    $addsql = "update mu_supply set supply_mu_content=:supply_mu_content,supply_name=:supply_name, supply_user_id=:supply_user_id,supply_type=:supply_type,supply_keyword=:supply_keyword,
            supply_category_id=:supply_category_id,supply_content=:supply_content,supply_address=:supply_address,supply_status=:supply_status,supply_phone=:supply_phone,supply_unit=:supply_unit,supply_price=:supply_price,supply_valid_date=:supply_valid_date
            where supply_id=:supply_id";

        $commd = Yii::app()->db->createCommand($addsql);

        $commd->bindValue(":supply_id", $this->supply_id, PDO::PARAM_STR);
        $commd->bindValue(":supply_name", $this->supply_name, PDO::PARAM_STR);
        $commd->bindValue(":supply_user_id", yii::app()->user->getID(), PDO::PARAM_STR);
        $commd->bindValue(":supply_type", $this->supply_category);
        $commd->bindValue(":supply_keyword", $this->supply_keyword);
        $commd->bindValue(":supply_category_id", $this->category);
        $commd->bindValue(":supply_content", $this->description);
        $commd->bindValue(":supply_address", $this->address);
        $commd->bindValue(":supply_mu_content", $this->muContent);
        $commd->bindValue(":supply_phone", $this->tel);
        $commd->bindValue(":supply_price", $this->price);
        $commd->bindValue(":supply_status", 1);
        $commd->bindValue(":supply_unit", 0);
        $commd->bindValue(":supply_valid_date", date('Y-m-d H:i:s'));
        $commd->execute();
    }
}
