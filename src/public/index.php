<?php

class Scanner {


    function __construct()
    {
        $path = $_SERVER['HOME'];
    }
    public function scan($directory){
        $dir = scandir($directory);
       foreach ($dir as $name){
            if($name == '.' or $name == '..') {
                continue;
            }
            if(is_dir($directory . '/' . $name)) {
                print_r($name);
                $this->scan($directory . '/' . $name);
            }
            else{
                print_r($name);
            }
        }


    }
}

$scanner = new Scanner();
$res = $scanner->scan('/');
print_r ($res);
