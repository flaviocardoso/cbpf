<?php
  function __autoload($class_name)
  {
    $directories = $arrayName = array(
      var_dump(__DIR__ . '/maining/path/')
    );

    foreach ($directories as $directory) {
      if(file_exists($directory.$class_name . '.php'))
      {
        require_once($directory.$class_name . '.php');
        return;
      }
    }
  }


?>
