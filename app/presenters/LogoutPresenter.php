<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogoutPresenter
 *
 * @author simekadam
 */
use Nette\Environment;

class LogoutPresenter extends BasePresenter{
/**
 * prekryta metoda pro kontrolu prihlasnei
 */
    public function isLoggedInOver() {
        parent::isLoggedInOver();
    }
/**
 * odkaz na facebook
 */
    public function getFacebook() {
        return parent::getFacebook();
    }

/**
 * akce pro prihlaseni
 */
    public function  actionLoginMe() {
        $this->redirect("Default:default");
    }
/**
 * odhlaseni
 */
    public function actionLogoutFromFacebook(){
        $logoutUrl = $this->getFacebook()->getLogoutUrl();
        $logoutUrl = str_replace("%2Flogout-from-facebook%2F", "", $logoutUrl);
        $this->redirectUri($logoutUrl);
        exit;
    }
/**
 * vykresleni presenteru
 */
    public function renderDefault(){
        
    }
    //put your code here
}
?>
