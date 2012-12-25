<?php
 #New Php File
 # Created With  Macbook Pro, 13", Late 2011
 # Mac OS X Mountain Lion
 #
 # © 2001-2012 WesDeGroot Projects (WDG.P), All Rights Reserved
 # © 2012-2013 WDG.P, All Rights Reserved
 # 
 # OPENSOURCE
 # => CC BY-SA 
 # => => That means you may use, edit, improve the code, as long you share it also; you MUST leave the names of 'WDG.P'
 #
 # => Rules: 
 # => http://wdgp.nl/#conditions

error_reporting(E_ALL);
ini_set('display.errors', 1);
ini_set('display_errors', 1);

//Needs Session Or Cookie.

define('BIHappy', 'BIHappy');
define('WOCnl',   'WOCnl');
define('WDGP',    'WDG.P');

define('_WARNING', E_USER_WARNING);
define('_ERROR',   E_USER_ERROR);
define('_NOTICE',  E_USER_NOTICE);

class WDGPapi
{

function connect($who)
{
  $this->connect = $who;
  switch($who)
  {
    case BIHappy:

    break;

    case WOCnl:

    break;

    case WDGP:

    break;

    case OSMS:

    break;

    default:
      trigger_error("No Such Service", _ERROR);
    break;
  }
}

function auth($apiKey)
{
  $chkApi = @file_get_contents("http://a.wdgp.nl/_api?skey=". $apiKey);
    if (!$chkApi)
     trigger_error('CAN NOT GET CONTENTS FROM API!');

  $chkApi = unserialize($chkApi);
  if ( $chkApi['status'] == "USEABLE" )
  {
    $this -> session = $chkApi['session'];
    $this -> lock    = $chkApi['lock'];
    $this -> api     = $chkApi['status'];
    $this -> key     = $apiKey;
  }
  elseif ( $chkApi['status'] == "MAINTENANCE" )
  {
    trigger_error("Sorry This Service is under maintenance.", _NOTICE);
  }
  else
  {
    trigger_error("Unknown status from service.", _ERROR);
  }

}

function loginViaWDGP($p=null)
{
  if(true) //if ( $this -> status == "USEABLE" )
  {
    $r = "<script type='text/javascript' src='http://by.wdgp.nl'></script>
          <script type='text/javascript' src='http://a.wdgp.nl/api/lang.js.php'></script>
          <script type='text/javascript'>document.write(translate('login with') + '&nbsp;' + '" . $this->connect . "');</script>
          <form method='POST' action='WDGPLogin.php'>
          <table>
          <tr>
          <td><script type='text/javascript'>document.write(translate('username'));</script>:</td>
          <td><input type='text' name='WDGUserName'></td>
          </tr>
          <tr>
          <td><script type='text/javascript'>document.write(translate('password'));</script>:</td>
          <td><input type='password' name='WDGPassword'></td>
          </tr>
          <tr>
          <td>&nbsp;<td>
          <td><input type='submit' id='LoginButton' value='Login'></td>
          </tr>
          </table>
          </form>

          <script type='text/javascript'>
          document.getElementById('LoginButton').value = translate('login');
          </script>
          ";
    $r = preg_replace(array("#\r\n#","#\n#","#\r#", "#  #"), null, $r);
    echo $r;
  }
  else
  {
    trigger_error('API NOT USEABLE', _ERROR);
  }
}

function getloggedinUser($p=null)
{
    $myUniqueID = md5(time() . $this->key);
    //WDGUserName, WDGPassword
}

}

$t=new WDGPapi();
$t->connect(BIHappy);
$t->loginViaWDGP('t');
?>