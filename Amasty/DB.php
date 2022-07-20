<?php

class DataBase
{
    public static function f1(){
        $mysql = new mysqli('localhost', 'root', 'root', 'amasty');
        $request1 = "SELECT * FROM pizza ";
        $result1 = $mysql->prepare($request1);
        $result1->execute();
        $result1 = $result1->get_result();
        return  $result1;
    }
    public static function f2(){
        $mysql = new mysqli('localhost', 'root', 'root', 'amasty');
        $request2 = "SELECT * FROM sauces ";
        $result2 = $mysql->prepare($request2);
        $result2->execute();
        $result2 = $result2->get_result();
        return  $result2;
    }
}