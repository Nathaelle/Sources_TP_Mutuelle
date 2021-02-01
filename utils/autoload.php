<?php

spl_autoload_register(function ($class) {
    //Models\Utilisateur

    $class = lcfirst(str_replace("\\", "/", $class));
    if(file_exists("$class.php")) {
        require "$class.php";
    }

});