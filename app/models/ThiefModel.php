<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThiefModel
 *
 * @author simekadam
 */
use Nette\Object,
 Nette\Environment;

class ThiefModel extends Object{
    //put your code here
    private $posts = 'Posts';
    private $friends = 'Friends';
    private $users = 'Users';

    private $conection;

    public function  __construct() {
        $this->conection = dibi::getConnection();
    }


    public static function initialize(){
        dibi::connect(Environment::getConfig('database'));
    }

    public function fetchAllUsers(){
        return $this->conection->select('*')->from($this->users);
    }

    public function fetchAllPosts(){
        return $this->conection->select('*')->from($this->posts);
    }

    public function fetchAllFriends(){
        return $this->conection->select('*')->from($this->comments);
    }

    public function insertUser($data){
        return $this->conection->insert($this->users, $data)->execute();
    }

    public function insertPost($data){
        return $this->conection->insert($this->posts, $data)->execute();
    }

    function insertFriend($data){
        return dibi::query('INSERT INTO [Friends] %ex', $data);
    }

    public function checkIfContents($table, $data, $row){
        $result = $this->conection->select('*')->from($table)->where('id=%i' , $data)->execute();
        return $result->fetchAll();
    }



}
?>
