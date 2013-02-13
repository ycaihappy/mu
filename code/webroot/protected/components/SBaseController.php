<?php

/**
 * SBaseController class file.
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */
/**
 * SBaseController must be extended by all of the applications controllers
 * if the auto srbac should be used.
 * You can import it in your main config file as<br />
 * 'import'=>array(<br />
 * 'application.modules.srbac.controllers.SBaseController',<br />
 * ),
 *
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.controllers
 * @since 1.0.2
 */

class SBaseController extends CController {

  /**
   * Checks if srbac access is granted for the current user
   * @param String $action . The current action
   * @return boolean true if access is granted else false
   */
  protected function beforeAction($action) {
    $del = Helper::findModule('admin')->delimeter;
    
    //srbac access
    $mod = $this->module !== null ? $this->module->id . $del : "";
    
    $contrArr = explode("/", $this->id);
    $contrArr[sizeof($contrArr) - 1] = ucfirst($contrArr[sizeof($contrArr) - 1]);
    $controller = implode(".", $contrArr);

    $controller = str_replace("/", ".", $this->id);
    // Static pages
    if(sizeof($contrArr)==1){
      $controller = ucfirst($controller);
    }
    $access = $mod . $controller . ucfirst($this->action->id);
    //Always allow access if $access is in the allowedAccess array
    if (in_array($access, $this->allowedAccess())) {
      return true;
    }

    if (Yii::app()->getModule('admin')->debug) {
      return true;
    }
    
     // Check for srbac access
    if (!Yii::app()->admin->checkAccess($access) || Yii::app()->admin->isGuest) {
      $this->onUnauthorizedAccess();
    } else {
      return true;
    }
  }

  /**
   * The auth items that access is always  allowed. Configured in srbac module's
   * configuration
   * @return The always allowed auth items
   */
  protected function allowedAccess() {
    return Helper::findModule('admin')->getAlwaysAllowed();
  }

  protected function onUnauthorizedAccess() {
    /**
     *  Check if the unautorizedacces is a result of the user no longer being logged in.
     *  If so, redirect the user to the login page and after login return the user to the page they tried to open.
     *  If not, show the unautorizedacces message.
     */
    if (Yii::app()->admin->isGuest) {
      Yii::app()->admin->loginRequired();
    } else {
      $mod = $this->module !== null ? $this->module->id : "";
      $access = $mod . ucfirst($this->id) . ucfirst($this->action->id);
      $error["code"] = "403";
      $error["title"] = '该请求没有通过认证';
      $error["message"] = '访问请求：' . ' ' . $mod . "/" . $this->id . "/" . $this->action->id . " 时报错.";
      //You may change the view for unauthorized access
      if (Yii::app()->request->isAjaxRequest) {
        $this->renderPartial(Yii::app()->getModule('admin')->notAuthorizedView, array("error" => $error));
      } else {
        $this->render(Yii::app()->getModule('admin')->notAuthorizedView, array("error" => $error));
      }
      return false;
    }
  }

}

