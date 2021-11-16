<?php
if (count($_POST) > 0)
{
    require_once "fileUploadProc.php";
    $fileUploadProcClass = new fileUploadProc();
    $output = $fileUploadProcClass->addFile();
    //echo $output;
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
    
    <title>File Upload</title>
</head>
<body>
<h1> File Upload </h1>

<div class="mb-3">  
  <a href="linksList.php" >Show File List<br></a>
</div>

<div class="mb-3">  
  <?php echo $output;?>
</div>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">                                                                <!-- fileName Field-->
  <label for="FileName" class="form-label">File Name</label>
  <input type="text" name="fileName" class="form-control" id="fileName">
</div>

<div class="mb-3">
    <input type="file" name="fileUpload" id="fileUpload">                         <!-- Choose file button -->
</div>

<div class="mb-3">
  <button type="submit" name="sendFile" class="btn btn-primary">Upload File</button>   <!-- sendFile Button-->
</div>

</form>


</body>


</html>