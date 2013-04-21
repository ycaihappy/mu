<?php



class DataBackController extends AdminController {

	private $config;
	private $mr;
	public function init()
	{
		$connect_str = parse_url(Yii::app()->db->connectionString);
		$re_str = explode('=', implode('=', explode(';', $connect_str['path'])));//取得数据库IP,数据库名
		$this->config = array( //设置参数
           'host' => $re_str[1],
           'dbname'=> $re_str[3],
           'port' => 3306,
           'username' => Yii::app()->db->username,
           'userPassword' => Yii::app()->db->password,
           'dbprefix' => Yii::app()->db->tablePrefix,
           'charset' => Yii::app()->db->charset,
           'path' => 'data/backup/',    //定义备份文件的路径
           'isCompress' => 1,             //是否开启gzip压缩{0为不开启1为开启}
           'isDownload' => 0               //压缩完成后是否自动下载{0为不自动1为自动}
		);
		$this->mr = new mysql_back($this->config);
	}

	
	public function actionShowData(){
		$path = $this->config['path'];
		$fileArr = $this->MyScandir($path);
		$list = array();
		foreach ($fileArr as $key => $value){
			if($key > 1){
				//获取文件创建时间
				$fileTime = date('Y-m-d H:i',filemtime($path . $value));
				$fileSize = filesize($path.$value)/1024;
				//获取文件大小
				$fileSize = $fileSize < 1024 ? number_format($fileSize,2).' KB':
				number_format($fileSize/1024,2).' MB';
				//构建列表数组
				$list[]=array(
					'id'=>$key,
                   'name' => $value,
                   'time' => $fileTime,
                   'size' => $fileSize
				);
				
			}
		}
		 $dataProvider=new CArrayDataProvider($list, array(
               
                'pagination'=>array(
                    'pageSize'=>10,
                ),
            ));
		$this->render('showData',array('dataProvider'=>$dataProvider));
	}
	 
	
	public function actionBackup(){
		if(Yii::app()->request->isAjaxRequest){
			$this->mr->setDBName($this->config['dbname']);
			if($this->mr->backup()){
				echo '数据库备份成功！';
			}else{
				echo '数据库备份失败！';
			}
		}
	}

	
	public function actionDelete_back(){
		if(Yii::app()->request->isAjaxRequest){
			if(unlink($this->config['path'] . basename($_GET['file']))){
				echo '删除备份成功！';
			}else{
				echo '删除备份失败！';
			}
		}
	}
	
	public function actionDownloadbak(){
		$this->download($this->config['path'] . basename($_GET['file']));
	}

	
	public function actionrecover(){
		if(Yii::app()->request->isAjaxRequest){
			$this->mr->setDBName($this->config['dbname']);
			if($this->mr->recover(basename($_GET['file']))){
				echo '数据还原成功！';
			}else{
				echo '数据还原失败！';
			}
		}
	}

	
	public function MyScandir($FilePath='./',$Order=0){
		
		$FilePath = opendir($FilePath);
		while($filename = readdir($FilePath)) {
			$fileArr[] = $filename;
		}
		$Order == 0 ? sort($fileArr) : rsort($fileArr);
		return $fileArr;
	}

	
	public function download($filename){
		ob_end_clean();
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-streamextension');
		header('Content-Length: '.filesize($filename));
		header('Content-Disposition: attachment; filename='.basename($filename));
		readfile($filename);
	}

}


?>