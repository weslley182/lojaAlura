<?php

	  function customAutoLoader($className){
          require_once("class/" . $className.'.php');
      }

	  spl_autoload_register("customAutoLoader");