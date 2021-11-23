<?php
if (count($_POST) > 0)
{
    require_once "classes/getNotes.php";
    $GN_class = new getNotesProc();
    $output = $GN_class->getNotes();
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
    
    <title>Display Notes</title>
</head>
<body>
<h1>Display Notes</h1>
<a href="addNotes.php">Add Notes</a>

<form method="POST">
<div class="mb-3">                                                              <!-- Start Date Field "begDate"-->
    <label for="begDate" class="form-label">Begginning Date</label>
    <input type="date" class="form-control" id="begDate" name="begDate">
</div>

<div class="mb-3">                                                              <!-- End Date Field "endDate"-->
<label for="endDate" class="form-label">Ending Date</label>
    <input type="date" class="form-control" id="endDate" name="endDate">
</div>

<div class="mb-3">                                                              <!-- Get Notes Button "displayNotes"-->
    <button type="submit" name="displayNotes" class="btn btn-primary">Get Notes</button>
</div>

<?php echo $output ?>  <!-- table output -->

</form>
</body>
</html>