<?php
class Site {
    
    /*
    * Controller
    */
    public static function frontpage() {
        view("the_front_page");
    }
    
    public static function theTime() {
        view('example/current_time', ['time' => time()]);
    }
    
    
    
}
