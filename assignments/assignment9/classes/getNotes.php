<?php
require_once "PdoMethods.php";

class getNotesProc extends PdoMethods
{
    public $start_DT; //start of search query
    public $end_DT;   //end of search query


    public function checkFields()  //checks start/end fields are not empty  ::RETURNS false IF EITHER FIELD IS EMPTY
    {

        $flag = TRUE;

        if (isset($_POST["displayNotes"]))
        {
            if($_POST["begDate"] == "")  //"if beggening date field is blank"
            {
                $flag = FALSE;
            }
            if($_POST["endDate"] == "")  //"if ending date is blank"
            {
                $flag = FALSE;
            }
        }
        return $flag; // RETURNS false IF EITHER FIELD IS EMPTY
    }

    public function dateToStamp($convert)
    {
        $D_arr = explode("-", $convert);  //D_arr [0] = yyyy [1] = mm [2] = dd
        return mktime(0, 0, 0, $D_arr[1], $D_arr[2], $D_arr[0]);
    }

    public function getNotes()   //searches for notes within query range
    {
        if($this->checkFields() == TRUE)
        {
            $this->start_DT = $_POST["begDate"];   //yyyy-mm-dd
            $this->end_DT = $_POST["endDate"];     //yyyy-mm-dd

            $startStamp = $this->dateToStamp($this->start_DT); // creates timestamp
            $endStamp = $this->dateToStamp($this->end_DT);     //  """"""

            $pdo = new PdoMethods();

            $sql = "SELECT * FROM date_time_notes";

            $records = $pdo->selectNotBinded($sql);

            if($records == 'error')
            {
		    	return 'There has been an error';
		    }
		    else 
            {
		    	if(count($records) != 0)
                {
                    return $this->createTable($records, $startStamp, $endStamp);
		    	}
		    	else 
                {
		    		return 'no notes found';
		    	}
		    }
        }//end if($this->checkFields() == TRUE)

        else //if($this->checkFields() == FALSE)
        {
            return "You must enter a start and end date <br>";
        }
    }//end getNotes()

    public function createTable($records, $start, $end)
    {
        $table = '<table class="table table-bordered">
            <thead>
            <tr>
              <th scope="col">Date/Time</th>
              <th scope="col">Note</th>
            </tr>
            </thead>
            <tbody>';
        foreach ($records as $row)
        {
            if ($row['Note_Timestamp'] >= $start && $row['Note_Timestamp'] <= $end)
            {
                $formattedDate = date("m/d/Y g:i A", $row['Note_Timestamp']);
                
                $table .= 
                "
                <tr>
                <th scope='row'>{$formattedDate}</th>
                <td>{$row['Note_Content']} </td
                </tr>
                ";
            }
            
        }
        $table .= '</tbody></table>';
        return $table;
    }
    

}//end class


?>