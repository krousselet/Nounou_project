<?php
require_once './partsPhp/header.php';
var_dump($_POST);
$session = new Session();
?> <script type="module">
          import { panda } from 'https://pandatown.fr/lib/pandalib.php';

panda.util.log('<?php echo $session->isLogin(); ?>','orange');
<?php
if($session->isLogin()){?>

        panda.util.log('<?php echo $session->GetNom(); ?>','orange');
      
<?php } ?> </script> <?php
// $mail = new Mail();

// $mail->sendEmail('shaefferaelita@gmail.com','test','test');
?>

<?php require_once './partsPhp/register.php';?>





<?php
require_once './partsPhp/footer.php';

?>




