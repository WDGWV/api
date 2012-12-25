/*
              ```      `::`                        
          `.:.///:`   /::.                        
         `/:`......  `.`        ``.`             
         ./-.-.....-           `......`           
         `/......`.`           .......`           
           .::....              `....`            
                          ///.......`              
                         ..:.......:+`            
        ```              `/.......`/.             
      .:.....`            /..   `/`s`             
     .:........           /-.   `/`s`             
     ::........           :..   `-`s.             
     `........           -+``    ::/o`            
        ````            .s`       :/++            
                       .s`         :-/o`          
                      `o-  `..:::....`:o          
                      .o.osyhhhhhhhhyo//o`       
                     /oshhhhhhhhhyyhhdds:o`      
                    :oyhysssssooooooosyhy:+`     
                   .++hyssoooooooooooosyhs..      
                  .:.yhyysssooooooooosyyhy...     
                  `/:.:+syyhhhhhhhhhhhyyo//+..`   
                    `.:://+oooosssssso+/++:..``   
                         `....:::....`````        

                        WesDeGroot Projects
                               By
                          Wesley De Groot


                (c) 2001-2012, WesDeGroot Projects
             
                  http://www.wdgp.nl/#conditions
                      ^ Terms & Conditions ^
                         Please Read Them.

*/

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display.errors', 1);

$language=array();

$language['nl'] = array(
                        'login with' => 'Inloggen met',
                        'username'   => 'Gebruiksernaam', 
                        'password'   => 'Wachtwoord', 
                        'login'      => 'Inloggen'
                       );
$language['en'] = array(
                        'login with' => 'Login with',
                        'username'   => 'Username', 
                        'password'   => 'Password', 
                        'login'      => 'Login'
                       );

        $lang = ($_SERVER['HTTP_ACCEPT_LANGUAGE']);  

        if(ereg("nl", $lang)) {  
            $language = $language['nl'];
        } else {  
            $language = $language['en'];
        } 

?>function translate(id) {<?php
    $wo="var myOrginal=new Array(";
    $ow="var myTranslation=new Array(";
foreach($language as $va => $vo)
{
  $wo .= "'" . $va . "',";  
  $ow .= "'" . $vo . "',";  
}

$wo .= "'lol');";
$ow .= "'lol');";

echo $wo . $ow;
?>if (myOrginal.indexOf(id.toLowerCase()) != '-1') {return myTranslation[myOrginal.indexOf(id.toLowerCase())];}else{return id.toLowerCase();}}