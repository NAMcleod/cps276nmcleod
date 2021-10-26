<?php
/*
This class will obtain a name from the form in "assignment5.php" check if a directory of that name exists.
If directory already exists, a message will be displayed saying so.

If no directory exists of inputted name, it will:
-make directory of input name,
-make file titled README.txt containing user input text
-return a link to the file created.
*/
class dirClass
{
    private $dirName;
    private $path;
    private $fileContent;

    public function checkForDir()   //checks if directory of name already exists, returns TRUE if found
    {
        if(isset($_POST['makeFile']))
        {
            $this->dirName = $_POST['dirName']; //user inputs dirName
            $this->path = "directories/" . $this->dirName; //path includes "directories folder"

            $this->fileContent = $_POST['readMeText']; //userinputs fileContents
        }

        foreach(glob($this->path) as $check)
        {
            if($check == $this->path)
            {
                return TRUE; 
            }//IF
        }//FOREACH
        return FALSE; //returns FALSE if directory isn't found
    }//end checkForDir()
    

    public function makeDir()   //makes directory and calls makeFile() if checkForDir == FALSE
    {
        if(!$this->checkForDir())
        {
            mkdir($this->path);
            chmod($this->path, 0777);
            $this->makeFile();
            chmod($this->path . "/README.txt", 0777);
            return "<a href=" . $this->path . "/README.txt>Click to See File</a>";
        }
        else
        {
            return "A file with that name already exists\n";
        }

    }//end makeDir()


    //makes file::"README.txt" inside of directory if makeDir is success. "README.txt" contains user input text.
    public function makeFile()
    {
        touch($this->path . "/README.txt");
        $handle = fopen($this->path . "/README.txt", 'w');
        fwrite($handle, $this->fileContent . "\n");
        fclose($handle);

    }//end makeFile()

    
}//end class

?>