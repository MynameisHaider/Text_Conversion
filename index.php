<?php
//setting mytext to empty string at start, because it will be assign a value when form is submitted.
$mytext ='';
if(isset($_POST['submit1'])){
    $mytext = $_POST['Sometext']; 
    $upperText = upperCase($mytext);
}else{
   if(isset($_POST['submit2'])){
    $mytext = $_POST['Sometext']; 
    $lowerText = lowerCase($mytext);
}
}


//function definition
function upperCase($str)
{
    $chars  = str_split($str);
    $result = '';
    
    for ($i = 0; $i < count($chars); $i++) {
        //extracting the character and getting its ASCII value
        $ch = ord($chars[$i]);
        
        //if character is a lowercase alphabet then converting 
        //it into an uppercase alphabet
        if ($chars[$i] >= 'a' && $chars[$i] <= 'z')
            $result .= chr($ch - 32);
        
        else
            $result .= $chars[$i];
        
    }
    //finally, returning the string
    return $result;
}

function lowerCase($str)
{
    $chars  = str_split($str);
    $result = '';
    
    //loop from 0th character to the last character
    for ($i = 0; $i < count($chars); $i++) {
        //extracting the character and getting its ASCII value
        $ch = ord($chars[$i]);
        
        //if character is a lowercase alphabet then converting 
        //it into an uppercase alphabet
        if ($chars[$i] >= 'A' && $chars[$i] <= 'Z')
            $result .= chr($ch + 32);
        
        else
            $result .= $chars[$i];
        
    }
    //finally, returning the string
    return $result;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRING CONVERSION</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="my_form">
    <form action="<?php echo $_SERVER['PHP_SELF']  ?>"  method="POST" >
    <h2> Enter text you want to convert! </h2>
    <label>Enter Some Text </label>
    <input type ="text" name = "Sometext" value ="<?php  echo htmlspecialchars($mytext) ?>">

    <label>Text after conversion!</label>
    <input type="text" name ="conversion" value ="<?php  echo $upperText ?? '' ?>">
    <input type ="submit" value="Convert to Upper Case" name= "submit1">

    <label>Text after conversion!</label>
    <input type="text" name ="conversion" value ="<?php  echo $lowerText ?? '' ?>">
    <input type ="submit" value="Convert to lower Case" name= "submit2">

    </form>

    </div>



</body>
</html>
