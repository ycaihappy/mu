<h1>进入测试区域</h1>
<?php
$this->widget('TestCacheWidget',array('id'=>'test_cache_widget','cacheID'=>'widgetFileCache','duration'=>'20'));?>
<h1>测试区域结束</h1>
<div>非测试区域
<p>
这是一个非缓存测试区域
</p>
</div>
