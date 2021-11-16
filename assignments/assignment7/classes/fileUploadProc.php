<?php
/******
This class will upload a file from the user, and determine if it is under 100000 bytes, and a PDF file.
If both requirements are met the file name entered by user and path (paths will all be to one pdf already on server) 
will be stored in a DB table.
A link on the form page "project7.php" will take users to "linksList.php"
******/
require "PdoMethods.php";

class fileUploadProc extends PdoMethods
{


    public function addFile() //calls checkSize/checkType, returns appropriate errors for both. Without errors will add files to MySQL table
    {   

        $returnMe; //a place to store error message
        $errorFlag = FALSE; //set true if checkSize/checkType return false

        if ($this->checkSize() == FALSE)
        {
            $errorFlag = TRUE;
            $returnMe .= "File size must be less than 100000 bytes<br>";
        }
        if ($this->checkType() == FALSE)
        {
            $errorFlag = TRUE;
            $returnMe .= "File must be PDF<br>";
        }
        if($errorFlag) //if errorFlag has been set TRUE, returns either/both appropriate messages
        {
            return $returnMe;
        }
        
        $pdo = new PdoMethods;
        $sql = "INSERT INTO uploadedFiles (file_name, file_path) VALUES (:fileName, :filePath)";

        $bindings = [
            [':fileName', $_POST['fileName'], 'str',],
            [':filePath', '../pdfPath/newsletterorform1.pdf', 'str']
        ];

        $result = $pdo->otherBinded($sql, $bindings);

        if ($result == 'error')
        {
            return "Error adding File";
        }
        else
        {
            return "File Added Succesfully";
        }

    }

    public function checkSize()//returns false if file is too big
    {
        if ($_FILES['fileUpload']["size"] > 100000)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function checkType()//returns false if file is not PDF
    {
        if ($_FILES['fileUpload']['type'] != 'application/pdf')
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>