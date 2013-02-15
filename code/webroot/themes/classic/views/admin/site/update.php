<?php
/**
 * update.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * A view used when an auth item is updated
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem.manage
 * @since 1.0.0
 */
 ?>
 <div class="title">修改字典分类</div>
<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
), false, true); ?>