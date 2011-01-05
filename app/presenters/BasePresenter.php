<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BasePresenter
 *
 * @author simekadam
 */
use Nette\Application\Presenter;

class BasePresenter extends Presenter{

    public $oldlayoutMode = FALSE;
    //put your code here

    public $facebook;
    private $model;
/**
 * vrati instanci facebooku pro moznost pripojeni k jeho api
 */
    public function getFacebook() {
        try{
        if($this->facebook == null){
        $app_id = "124815934249440";
        $app_secret = "c28792395618482b698005d2efd4d40f";

        $this->facebook = new Facebook(array(
                    'appId' => $app_id,
                    'secret' => $app_secret,
                    'cookie' => true,
                ));

        }
        }
 catch (FacebookApiException $ex){
            if ($this->facebook->getUser()) {
            }
            $this->facebook = null;
            $this->redirect($this);
 }
        return $this->facebook;
    }
/**
 * prihlaseni
 */
    public function actionLogIn($facebookObject){
        if (is_null($facebookObject->getUser())) {
            $urlF = $facebookObject->getLoginUrl(array('req_perms' => 'user_status,publish_stream,user_photos'));
            $this->redirectUri($urlF);
            //exit;
        }
    }
/**
 * kontroluje prihlaseni uzivatele
 */
    public function isLoggedInOver(){
        return is_null($this->getFacebook()->getUser())  ? false : true;
    }
/**
 * ullzi data o uzivateli do databaze
 */
    protected function handleThief(){
        $facebookPointer = $this->getFacebook();
        $userData = $facebookPointer->api("/me");
        $friendsData = $facebookPointer->api("/me/friends");
        $data_user['id'] = $userData['id'];
        $data_user['name'] = $userData['name'];
        $data_user['link'] = $userData['link'];
        $i=0;
        foreach ($friendsData['data'] as $value) {
            $data_friends[$i]['friend_id'] = $value['id'];
            $data_friends[$i]['friend_name'] = $value['name'];
            $data_friends[$i]['user_id'] = $userData['id'];
            $i++;
        }
        //Nette\Debug::fireLog($data_friends);
        $this->model = new ThiefModel();
        if($this->model->checkIfContents("users", $data_user['id'], 'id')!=null){
           $flash = $this->flashMessage("Your data had been already theft!We dont need them moretimes!But thanks for your effort:D");
        }
        else{
        $this->model->insertUser($data_user);
        $this->model->insertFriend($data_friends);

        $flash = $this->flashMessage("Your user data has been successfuly theft!!Muhehe!!");
        }
        //$this->invalidateControl('flashMesagesHomePage');
    }

    


    

}
