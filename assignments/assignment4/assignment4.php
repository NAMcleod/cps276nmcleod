<?php
$output = "";

if(count($_POST) > 0)
{
    require_once "AddNameProc.php";
    $addName = new AddNamesProc();
    $output = $addName->addClearNames();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title>Project 4: Names Form</title>
</head>
<h1>
Add Names
</h1>
<body>
<form method="POST">
<div class="col-12">
  <button type="submit" name="AddName" class="btn btn-primary">Add Name</button>
  <button type="submit" name="ClearName" class="btn btn-primary">Clear Names</button>
</div>

<div class="mb-3">
  <label for="fullName" class="form-label">Enter Name</label>
  <input type="text" name="fullName" class="form-control" id="fullName">
</div>

<div class="mb-3">
    <label for="namelist" class="form-label">List of Names</label>
    <textarea style="height: 500px;" class="form-control"               
    id="namelist" name="namelist"><?php echo $output ?></textarea> 
</div>
</form>
</body>