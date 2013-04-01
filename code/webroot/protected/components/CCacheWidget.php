<?php

class CCacheWidget extends COutputCache {

	const CACHE_KEY_PREFIX='Yii.CCacheWidget.';
	
    public $cacheID='widgetFileCache';
    
    public $duration=30;

	public function init(){
		if($this->getIsContentCached())
		$this->replayActions();
		else if($this->_cache!==null)
		{
			$this->getController()->getCachingStack()->push($this);
			ob_start();
			ob_implicit_flush(false);
			$this->initWidget();
		}
	}

	public function run(){
		if($this->getIsContentCached())
		{
			if($this->getController()->isCachingStackEmpty())
			echo $this->getController()->processDynamicOutput($this->_content);
			else
			echo $this->_content;
		}
		else if($this->_cache!==null)
		{
			$this->runWidget();
			$this->_content=ob_get_clean();
			$this->getController()->getCachingStack()->pop();
			$data=array($this->_content,$this->_actions);
			if(is_array($this->dependency))
			$this->dependency=Yii::createComponent($this->dependency);
			$this->_cache->set($this->getCacheKey(),$data,$this->duration,$this->dependency);

			if($this->getController()->isCachingStackEmpty())
			echo $this->getController()->processDynamicOutput($this->_content);
			else
			echo $this->_content;
		}
	}

	public function initWidget()
	{

	}
	public function runWidget()
	{

	}
}


?>