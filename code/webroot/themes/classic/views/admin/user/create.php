<?php
/**
 * create.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * The create new auth item view.
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem.manage
 * @since 1.0.0
 */
 ?>
<div class="title">创建新权限项目</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
), false, true); ?>