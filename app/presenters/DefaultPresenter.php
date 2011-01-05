<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultPresenter
 *
 * @author simekadam
 */

use Components\AddStatus;
use Nette\Environment;

class DefaultPresenter extends BasePresenter{

/**
 * prekryta metoda pro ziskani instance facebooku
 */
    public function  getFacebook() {
        return parent::getFacebook();
    }
/**
 * vrati pointer na aktualniho uzivatele
 */
    public function getCurrentUser(){
        return $this->getFacebook()->api("/me");
    }
/**
 * nacte statusy z facebooku do pole
 */

    public function showMyStatuses(){
        try{
        $statuses = $this->getFacebook()->api("/me/statuses");
        return $statuses;
        }
 catch (FacebookApiException $exception){
//     $flash = $this->flashMessage($exception->getMessage());
//     $this->invalidateControl('flashMesagesHomePage');
     $this->redirect('Default');
        }
    }


    public function actionPhotos(){
        $imgs;
        foreach (Nette\Finder::findFiles('*.gif')->from('images/images/') as $file => $a){
            $imgs[] = $file;
        }
        $this->template->imgs = $imgs;
        $this->renderPhotos();
    }

    public function renderPhotos(){
    }

    /**
 * obsluha odkazu
 */
    public function  handleThief() {
        parent::handleThief();
        $this->invalidateControl('flashMesagesHomePage');
        $this->renderDefault();
    }

/**
 * obsluha odkazu na likovani prispevku
 */
    public function handleLike($id){
        $ahoj = $this->getFacebook()->api($id.'/likes', 'POST');
        if($this->isAjax()){
            $this->invalidateControl('zkouska');
            $flash[] = $this->flashMessage($ahoj);
        }


    }
    /**
     * meotda se vykona po startu aplikace
     */
    public function   startup() {
        parent::startup();
        parent::actionLogIn($this->getFacebook());
    }
/**
 * vatvoreni komponenty na pridani statusu
 */
    public function  createComponentAddStatusForm($name) {
        $addStatusForm = new AddStatus($this,'addStatusForm');
        $addStatusForm->onOkClick[] = array($this, 'AddPostOnOkClick');
    }
/**
 * renderovani presenteru
 */
    public function renderDefault(){
        $this->invalidateControl('zkouska');
        $this->invalidateControl('flashMesagesHomePage');
        $this->template->statuses = $this->showMyStatuses();
        $this->template->ouser = $this->getCurrentUser();
    }
/**
 * odeslani prispevku na facebook
 */
    public function AddPostOnOkClick(\Nette\Forms\SubmitButton $button){
            $form = $button->getForm();
            $post = $form['status']->getValue();
            try{
            $this->getFacebook()->api('/me/feed', 'POST', array('message' => $post));
            $flash = $this->flashMessage("Your status has been successfuly posted");
            }
            catch (FacebookApiException $exception){
                    $flash = $this->flashMessage("Something goes wrong");
            }
            $this->invalidateControl('zkouska');
            $this->invalidateControl('flashMesagesHomePage');
        }

    //put your code here
}
