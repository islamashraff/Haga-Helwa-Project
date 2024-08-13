<?php
namespace exam_2;


class session
{

        public function __construct()
        {
            session_start(); 
        }



        public function setSession($key,$value)
        {
            $_SESSION[$key]= $value;
        } 


        public function getSession($key)
        {
            return (isset($_SESSION[$key]))? $_SESSION[$key] : "session not found";

        } 

        public function removeSession($key)
        {
            unset($_SESSION[$key]);
        } 

        public function deleteSession()
        {
        session_destroy();
        } 

}







