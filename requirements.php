<?php
   
   function requirements(){
   
      if (version_compare(PHP_VERSION, '7.1.0') < 0){
        
         throw new Exception('You have to upgrade your PHP version to 7.1.0 +');
      }
     
   }