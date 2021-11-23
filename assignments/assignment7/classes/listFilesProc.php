<?php
require_once "PdoMethods.php";

class listFilesProc extends PdoMethods
{

    public function getFiles()
    {
        $pdo = new PdoMethods();

        $sql = "SELECT * FROM uploadedFiles";

        $records = $pdo->selectNotBinded($sql);

        if($records == 'error'){
			return 'There has been an error';
		}
		else {
			if(count($records) != 0)
            {
                return $this->createList($records);
			}
			else 
            {
				return 'no files found';
			}
		}
    }

    public function createList($records)
    {
        $list = '<ul>';
		foreach ($records as $row){
			$list .= "<li><a href='pdfPath/newsletterorform1.pdf'>{$row['file_name']}</a></li>";
		}
		$list .= '</ul>';
		return $list;
    }



}


?>