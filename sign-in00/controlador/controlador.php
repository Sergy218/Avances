<?php

/*echo  $_POST['email'];
echo '<br>';
echo $_POST['password'];
echo '<br>';
echo 'btn'.$_POST['submit'];
*/
if(isset($_POST['submit'])) //Validar enviar
{

      //Verificar 
      require "../modelo/modelo.php";


      $email =    $_POST['email'];
      $password = $_POST['password'];


      //$usuario = new Usuario($email,$password);


      $results = $_DB->select(
        "SELECT nombre FROM usuario WHERE password ='".$password. "' AND email ='".$email."'",
      );
      
      //var_dump($results);
      if(count($results)>0){;
          foreach ($results as $res) {
            echo $res['nombre'] . '<br>';//nombre
            
        }
      } else {
        header('Location: http://localhost/h3/sign-in/index.html');
        exit;
      }

}
else  {
  header('Location: http://localhost/h3/sign-in/index.html');
  exit;
}

 
?>