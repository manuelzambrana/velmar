<?php

//autoload para los requiere
spl_autoload_register(function($class){
    if (is_file(CORE."$class.php"))
    {
        require CORE."$class.php";
    }else{
        echo "no se encontro class";
    }

});