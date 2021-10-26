<?php
if(count($_POST) > 0)
{
    require_once "dirClass.php";
    $dirClass = new dirClass();
    $output = $dirClass->makeDir();
    echo $output;
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
    
    <title>Project 5: Directories</title>
</head>
<body>
    <h1>
    File and Directory Assignment
    </h1>

<form method="POST">

Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.

<div class="mb-3">                                                                <!-- dirName Field-->
  <label for="DirectoryName" class="form-label">Folder Name</label>
  <input type="text" name="dirName" class="form-control" id="DirectoryName">
</div>

<div class="mb-3">                                                                <!-- readMeText Field-->
    <label for="FileContents" class="form-label">File Content</label>
    <textarea style="height: 500px;" class="form-control"               
    id="FileContents" name="readMeText"></textarea> 
</div>

<div class="col-12">
  <button type="submit" name="makeFile" class="btn btn-primary">Submit</button>   <!-- makeFile Button-->
</div>


</form>
</body>