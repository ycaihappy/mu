<?php
class areaImportCommand extends CConsoleCommand{
	
	public function run($args)
	{
		$dom = new DOMDocument;
		/*$dom->load('Provinces.xml');
		
		$provinces= $dom->getElementsByTagName('Province');
		$city=new City();
		foreach ($provinces as $province)
		{
			$city->city_id=$province->attributes->item(0)->nodeValue;
			$city->city_level=2;
			$city->city_name=$province->attributes->item(1)->nodeValue;
			$city->city_open=1;
			$city->setIsNewRecord(true);
			$city->save();
		}*/
		$dom->load('Cities.xml');
		$cities=$dom->getElementsByTagName('City');
		echo count($cities);
		exit;
		foreach ($cities as $cy)
		{
			$city->city_id=$cy->attributes->item(0)->nodeValue;
			$city->city_level=2;
			$city->city_name=$cy->attributes->item(1)->nodeValue;
			$city->city_parent=$cy->attributes->item(2)->nodeValue;
			$city->city_open=1;
			$city->setIsNewRecord(true);
			$city->save();
		}
		
	}
}

