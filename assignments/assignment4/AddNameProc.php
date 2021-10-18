<?php
//This script declares a class that will add and sort names displayed in text area of assignment4. The class
//will determine what to do based on which buttons are clicked on the form file.


//
class AddNamesProc
{
    private $nameString;
    
    public function sortNameList()
    {
        $tempArr = explode("\n", $this->nameString);
        sort($tempArr);
        $this->nameString = implode("\n", $tempArr);
        return $this->nameString;
    }

    public function addName($name, $currentList) //sorts names and returns them to addClearNames
    {
        $swap;
        $strTemp;

        $tempArr = explode(" ", $name); //tempArr = "firstname","lastname"
        $swap = $tempArr[1];       //swap = lastname
        $tempArr[1] = $tempArr[0]; //tempArr[1] = firstname
        $tempArr[0] = $swap;       //tempArr[0] = lastname
        $strTemp = implode(", ", $tempArr); //strTemp = "lastname, firstname"

        $this->nameString .= $strTemp . "\n" . $currentList;
        $this->sortNameList();
        return $this->nameString;

    }//end

    public function addClearNames() //should return the list of sorted names to be displayed
    {
        if(isset($_POST['AddName']))  //add name to list, sort list, return
        {
            return $this->addName($_POST['fullName'], $_POST['namelist']);
        }

        if(isset($_POST['ClearName'])) //clear list
        {
            return $this->clearNames();
        }
    }//end addClearNames___

    public function clearNames() //clears all names from list, calleb by clearAddNames()
    {
        $this->nameString = "";
        return $this->nameString;
    }

}//end class AddNamesProc

?>