<?php

class Calculator
{
    private $result;

    public function CheckOperator($operator) //returns true if operator is +. -. * or /
    {
        $validOperator = FALSE;
        switch($operator)
        {
            case "+": $validOperator = TRUE; break;
            case "-": $validOperator = TRUE; break;
            case "*": $validOperator = TRUE; break;
            case "/": $validOperator = TRUE; break;
            default: $validOperator = FALSE; break;
        }//END SWITCH
        return $validOperator;
    }//END FUNCTION CheckOperator

    public function CheckLeft($leftOperand) //returns true if left operand is integer
    {
        if (is_int($leftOperand))
            {
                return TRUE;
            }
        else
            {
                return FALSE;
            }
    }//END FUNCTION CHECKLEFT

    public function CheckRight($rightOperand) //returns true if right operand is integer
    {
        if (is_int($rightOperand))
            {
                return TRUE;
            }
        else
            {
                return FALSE;
            }
    }//END FUNCTION CHECKRIGHT

    public function DivideByZeroError($operator, $rightOperand) //returns true if attempting to divide by zero
    {
        $divideBy0Error;
        if($operator == "/" && $rightOperand == 0)
        {
            $divideBy0Error = TRUE;
        }
        else
        {
           $divideBy0Error = FALSE;
        }
        return $divideBy0Error;
    }//END FUNCTION DIVIDEBYZEROERROR
    
    //function calc calls all check functions, and either displays error, or successful calculation
    public function calc($operator = "n/a", $leftOperand = "n/a", $rightOperand = "n/a")  
    {
        if($operator == "n/a" || $leftOperand == "n/a" || $rightOperand == "n/a")
        {
            return "You must enter a string and two numbers<br>";
        }

        if(!$this->CheckOperator($operator))
        {
            return "Invalid Operator<br>";
        }
        
        if (!$this->CheckLeft($leftOperand))
        {
            return "Invalid Left Operand <br>";
        }

        if (!$this->CheckRight($rightOperand))
        {
            return "Invalid Right Operand<br>";
        }

        if ($this->DivideByZeroError($operator, $rightOperand))
        {
            return "Cannot divide by Zero<br>";
        }
        
        //switch statement preforms and displays successful calculation message
        switch($operator)
        {
            case "+":
                $this->result = $leftOperand + $rightOperand; 
                return "The sum of the numbers is " . (string)$this->result . "<br>";
                break;
            case "-": 
                $this->result = $leftOperand - $rightOperand; 
                return "The differnce of the numbers is " . (string)$this->result . "<br>";
                break;
            case "*": 
                $this->result = $leftOperand * $rightOperand; 
                return "The product of the numbers is " . (string)$this->result . "<br>";
                break;
            case "/": 
                $this->result = $leftOperand / $rightOperand; 
                return "The division of the numbers is " . (string)$this->result . "<br>";
                break;
            default: return "Unforseen Error <br>";
        } //end switch($operator)
        

    }//END FUNCTION CALCULATE

}
?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Project 3: Calculator Class</title>
</head>

<body>
</body>