<?php

/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsFeedPresenter
 *
 * @author simekadam
 */
use Components\AddStatus;
use Nette\Environment;


class NewsFeedPresenter extends BasePresenter {

    //put your code here
    public function getFacebook() {
        return parent::getFacebook();
    }

    /**
 * vrati pointer na aktualniho uzivatele
 */
    public function getCurrentUser(){
        return $this->getFacebook()->api("/me");
    }


    /**
     * obsluha odkazu na likovani prispevku
     */
    public function handleLike($id) {
        $ahoj = $this->getFacebook()->api($id . '/likes', 'POST');
        if ($this->isAjax()) {
            $this->invalidateControl('zkouska');
            $flash[] = $this->flashMessage($ahoj);
        }
    }

    /**
     * zobrazi newsfeed
     */
    public function showMyNewsFeed() {
        $newsFeed = $this->getFacebook()->api("/me/home?type=status");
        return $newsFeed;
    }

    /**
     * vatvoreni komponenty na pridani statusu
     */
    public function createComponentAddStatusForm($name) {
        $addStatusForm = new AddStatus($this, 'addStatusForm');
        $addStatusForm->onOkClick[] = array($this, 'AddPostOnOkClick');
    }
    
     /**
     * meotda se vykona po startu aplikace
     */
    public function   startup() {
        parent::startup();
        parent::actionLogIn($this->getFacebook());
    }

//    public function handleDefault(){
//        if($this->isAjax()){
//            $this->invalidateControl('zkouska');
//        }
//
//    }
    /**
     * vykresleni presenteru
     */
    public function renderDefault() {
        $this->invalidateControl('zkouska');
        $this->template->ouser = $this->getCurrentUser();
        $this->template->newsFeedDatas = $this->showMyNewsFeed();
    }

    /**
     * odeslani prispevku na facebook
     */
    public function AddPostOnOkClick(\Nette\Forms\SubmitButton $button) {
        $form = $button->getForm();
        $post = $form['status']->getValue();
        try {
            $this->getFacebook()->api('/me/feed', 'POST', array('message' => $post));
            $flash = $this->flashMessage("Your status has been successfuly posted");
        } catch (FacebookApiException $exception) {
            $flash = $this->flashMessage("Something goes wrong");
        }
        $this->invalidateControl('zkouska');
        $this->invalidateControl('flashMesagesHomePage');
    }

    /**
 * obsluha odkazu
 */
    public function  handleThief() {
        parent::handleThief();
        $this->invalidateControl('flashMesagesHomePage');
    }

}

?>
