<?php
class areaImportCommand extends CConsoleCommand{
	
	public function run($args)
	{
		$dom = new DOMDocument;
		$dom->load('Provinces.xml');
		
		$xml= simplexml_import_dom($dom);
		$provinces=$xml->Province;
		
		$city=new City();
		foreach ($provinces as $province)
		{
			$attrbutes=$province->attributes();
			$city->city_id=$attrbutes['ID'];
			$city->city_level=2;
			$city->city_name=$attrbutes['ProvinceName'];
			$city->city_open=1;
			$city->setIsNewRecord(true);
			$city->save();
		}
		
		$dom->load('Cities.xml');
		$xml= simplexml_import_dom($dom);
		$cities=$xml->City;
		foreach ($cities as $cy)
		{
			$attrbutes=$cy->attributes();
			$city=new City();
			$city->city_level=3;
			$city->city_name=$attrbutes['CityName'];
			$city->city_parent=$attrbutes['PID'];
			$city->city_open=1;
			$city->setIsNewRecord(true);
			$city->save();
		}
		
	}
}

