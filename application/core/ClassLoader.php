<?php


class ClassLoader
{
    protected $dirs;

    public function register()
    {
        spl_autoload_register(array($this,'loadClass'));
    }

    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    public function loadCLass($class)
    {
        foreach($this->dirs as $dir){
            $file = $dir . '/' . $class . '.php';
            if(is_readable($file)){
                require $file;

                return;
            }
        }
    }
}