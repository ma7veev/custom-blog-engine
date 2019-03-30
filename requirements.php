<?php
   
   function requirements(){
   
      if (version_compare(PHP_VERSION, '5.6.4') < 0){
        
         throw new Exception('You have to upgrade your PHP version to 5.6 +');
      }
     
   }