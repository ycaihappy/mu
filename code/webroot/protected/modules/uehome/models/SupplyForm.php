<?php

class SupplyForm extends CFormModel
{
    public $supply_id;
	public $supply_category;
	public $supply_name;
	public $supply_keyword;
	public $category;
    public $city;
    public $address;
    public $unit;
    public $tel;
    public $status;
    public $price;
    public $muContent;
    public $waterContent;
    public $description;
    public $effective_time;
    public $image;


	/**
	 * Declares the validation rules.
	 */
	public function rules()
    {
        return array(
        	array('tel','required','message'=>'请填写电话号码'),
        	array('tel','CPhoneValidator','message'=>'电话号码格式不正确'),
        	array('supply_name','required','message'=>'请填写供求名称'),
        	array('city','required','message'=>'请选择所在城市'),
        	array('muContent','required','message'=>'请选择品阶'),
        	array('price','numerical','message'=>'价格必须是数字类型'),
        	array('category','required','message'=>'请选择品类'),
        	array('supply_category','required','message'=>'请选择供求类型'),
        	array('image,description,unit,address,supply_keyword,supply_id,effective_time','safe'),	
            	
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
        $addsql = "insert into mu_supply(supply_image_src,supply_city_id,supply_mu_content,supply_water_content,supply_name, supply_user_id,supply_type,supply_keyword,
            supply_category_id,supply_content,supply_address,supply_status,supply_phone,supply_unit,supply_price,supply_valid_date,supply_join_date)
            values(:image,:supply_city,:muContent,:waterContent,:supply_name,:supply_user_id,:supply_type,:supply_keyword,:supply_category_id,
            :supply_content,:supply_address,:supply_status,:supply_phone,:supply_unit,:supply_price,:supply_valid_date,:supply_join_date)";

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
        $commd->bindValue(":image", $this->image);
        $commd->bindValue(":supply_status", 33);
        $commd->bindValue(":supply_unit",$this->unit);
        $commd->bindValue(":supply_valid_date", $this->effective_time);
        $commd->bindValue(":supply_join_date", date('Y-m-d H:i:s'));
        $commd->execute();
	}

    public function update()
    {
    $addsql = "update mu_supply set 
    supply_city_id=:city,
    supply_water_content=:waterContent,
    supply_mu_content=:supply_mu_content,
    supply_name=:supply_name,
    supply_type=:supply_type,
    supply_keyword=:supply_keyword,
    supply_category_id=:supply_category_id,
    supply_content=:supply_content,
    supply_address=:supply_address,
    supply_phone=:supply_phone,
    supply_unit=:supply_unit,
    supply_price=:supply_price,
    supply_image_src=:image,
    supply_valid_date=:supply_valid_date
            where supply_id=:supply_id";

        $commd = Yii::app()->db->createCommand($addsql);
        $commd->bindValue(":supply_id", $this->supply_id);
        $commd->bindValue(":supply_name", $this->supply_name, PDO::PARAM_STR);
        $commd->bindValue(":supply_type", $this->supply_category);
        $commd->bindValue(":supply_keyword", $this->supply_keyword);
        $commd->bindValue(":supply_category_id", $this->category);
        $commd->bindValue(":supply_content", $this->description);
        $commd->bindValue(":supply_address", $this->address);
        $commd->bindValue(":image", $this->image);
        $commd->bindValue(":city", $this->city);
        $commd->bindValue(":supply_mu_content", $this->muContent);
        $commd->bindValue(":waterContent", $this->waterContent);
        $commd->bindValue(":supply_phone", $this->tel);
        $commd->bindValue(":supply_price", $this->price);
        $commd->bindValue(":supply_unit", $this->unit);
        $commd->bindValue(":supply_valid_date", $this->effective_time);
        $commd->execute();
    }
}
