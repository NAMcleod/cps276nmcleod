<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init()
{

    echo login();  
/* this form takes in email and password from user */
    $acknowledgement = "";

    $form = <<<HTML

    <h1>Login</h1>

    <form method="post" action="index.php?page=login">

    <!-- EMAIL -->
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name="email" value="default@admin.com" >    
    </div>

    <!-- PASSWORD -->
    <div class="form-group">
      <label for="password">Password </label>
      <input type="password" class="form-control" id="password" name="password" value="password" >
    </div>

    <!-- SUBMIT BUTTON -->
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </div>
  </form>

HTML;

    return [$acknowledgement, $form];  
}

function login()
{
  if (isset($_POST['submit']))
  {
    require_once('classes/Pdo_methods.php');
    $pdo = new PdoMethods();
    $sql = "SELECT * FROM tableADMIN";

    $match = FALSE;

    $records = $pdo->selectNotBinded($sql);

    if ($records == 'error')
    {
      return "There has been an error";
    }
    else
    {
      if (count($records) != 0)
      {
        foreach($records as $row)
        {
          if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password'])
          {
            session_start();

            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['access'] = 'granted';
            $_SESSION['status'] = $row['status'];

            header('location: index.php?page=welcome');
            $match = TRUE;
          }
        }
      }
      else
      {
        return 'There are no users';
      }
      if ($match == FALSE)
      {
        return 'Login Failed';
      }
    }
  }

}

?>