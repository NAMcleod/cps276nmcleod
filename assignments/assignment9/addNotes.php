<?php

if(count($_POST) > 0)
{
    require_once "classes/makeNotes.php";
    $MN_class = new makeNotes();
    $output = $MN_class->makeNote();
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
    
    <title>Add Notes</title>
</head>
<body>
<h1>Add Notes</h1>
<a href="displayNotes.php">Display Notes<br></a>


<form method="POST">
<?php echo $output ?>    
<div class="mb-3">                                                                      <!-- Date/Time Field "dateTime"-->
    <label for="dateTime" class="form-label">Date and Time</label>  
    <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
</div>

<div class="mb-3">                                                                      <!-- Note Contents Field "noteContents"-->                                                               
    <label for="noteContents" class="form-label">Note</label>
    <textarea style="height: 500px;" class="form-control"               
    id="noteContents" name="noteContents"></textarea> 
</div>

<div class="mb-3">                                                                      <!-- Add Note Button "addNote"--> 
    <button type="submit" name="addNote" class="btn btn-primary">Add Note</button>
</div>

</form>
</body>
</html>