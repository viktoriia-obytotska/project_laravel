<?php

class Scanner {
    public $path;

    function __construct(string $path)
    {
        $this->path = $path = $_SERVER['HOME'];
    }
    public function scan(){
        $directory = opendir($this->path);
        while (false !== ($name = readdir($directory))){
            if($name == '.' or $name == '..') continue;
            if(is_dir($directory . '/' . $name)) {
                print_r($name);
                $this->scan($directory . '/' . $name);
            }
            else{
                print_r($name);
            }
        }
        closedir($directory);

    }
}

$scanner = new Scanner('/src');
$res = $scanner->scan();
var_dump($res);
