<?php
require "PdoMethods.php";

class makeNotes extends PdoMethods
{
    public $stamp; //stores date/time after conversion to timestamp
    public $note;  //stores contents of the note


    public function checkFields()  //check all fields are filled  RETURNS false IF EITHER FIELD IS EMPTY
    {
        
        $flag = TRUE;
        //echo "!*!" . $_POST["dateTime"];     //delete or comment me!*!
        //echo "!*!" . $_POST["noteContents"]; //delete or comment me!*!
        
        if (isset($_POST["addNote"]))
        {
            if ($_POST["dateTime"] == "")
            {
                $flag = FALSE;
            }
            if ($_POST["noteContents"] == "")
            {
                $flag = FALSE;
            }
        }

        return $flag;  //if FALSE, either or both fields were not set
        
    }

    public function makeNote()  //change date/time to timestamp
    {
        
        if($this->checkFields() == TRUE)
        {
            
            $DT_arr = explode("T", $_POST["dateTime"]);  //$DT_arr[0] => yyyy-mm-dd $DT_arr[1] => HH:MM
            $D_arr = explode("-", $DT_arr[0]);  //D_arr [0] = yyyy [1] = mm [2] = dd
            $T_arr = explode(":", $DT_arr[1]);  //T_arr [0] == HH [1] = MM

            $this->stamp = mktime($T_arr[0], $T_arr[1], 0, $D_arr[1], $D_arr[2], $D_arr[0]);  //setting class members
            $this->note = $_POST["noteContents"];                                               //""  ""  ""
            
            
            $pdo = new PdoMethods;
            $sql = "INSERT INTO date_time_notes (Note_Timestamp, Note_Content) VALUES (:noteStamp, :noteCont)";
    
            $bindings = 
            [
                [':noteStamp', $this->stamp, 'int',],
                [':noteCont', $this->note, 'str']
            ];
    
            $result = $pdo->otherBinded($sql, $bindings);
    
            if ($result == 'error')
            {
                return "Error adding Note";
            }
            else
            {
                return "Note Added Succesfully";
            }
        }//if($this->checkFields() == TRUE)


        else //if($this->checkFields() == FALSE)
        {
            return "You must enter a date/time and a note.";
        }
        
    }
}


?>