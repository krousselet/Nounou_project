<?php
require_once __DIR__.'/partsPhp/header.php';
var_dump($_POST);
$session = new Session();

if($session->isLogin()){
  include __DIR__.'/Page/Dashboard.php';
}else{
  include __DIR__.'/Page/Login.php';
}

?> 

<?php
require_once __DIR__.'/partsPhp/footer.php';

?>




