<?php
class CStringHelper extends CController
{
	public static function truncate_utf8_string($string, $length, $etc = '...')
	{
		$result = '';
		$string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
		$strlen = strlen($string);
		for ($i = 0; (($i < $strlen) && ($length > 0)); $i++)
		{
			if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0'))
			{
				if ($length < 1.0)
				{
					break;
				}
				$result .= substr($string, $i, $number);
				$length -= 1.0;
				$i += $number - 1;
			}
			else
			{
				$result .= substr($string, $i, 1);
				$length -= 0.5;
			}
		}
		$result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
		if ($i < $strlen)
		{
			$result .= $etc;
		}
		return $result;
	}
	public static function getExculedUrl($excludedParams,$route)
	{
		$paramString='';
		if($excludedParams)
		{
			if(!is_array($excludedParams))
			{
				$excludedParams=(array)$excludedParams;
			}
			$includeParam=$_REQUEST;
			foreach ($excludedParams as $exc)
			{
				unset($includeParam[$exc]);
			}
			if($includeParam)
			{
				 
				$paramString='&'.http_build_query($includeParam);
			}
		}
		return Yii::app()->getController()->createUrl($route).$paramString;
		 
	}
	public static function generatePassword( $length = 6 ) {
		// 密码字符集，可任意添加你需要的字符
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~+=?|';

		$password = '';
		for ( $i = 0; $i < $length; $i++ )
		{
			$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
		}
		return $password;
	}
}
