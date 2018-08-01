<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>Show form content:</div>        
        <?php foreach($_POST as $key => $value){
    echo "<li>$key: $value</li>";  
}?>
        <div>Show tracted content FILTER_SANITIZE_STRING:</div>        
        <?php foreach($_POST as $key => $value){
            $tracted=filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    echo "<li>$key : $tracted</li>";  
}?>
        
             <div>Show tracted content FILTER_SANITIZE_SPECIAL_CHARS:</div>        
        <?php foreach($_POST as $key => $value){
            $tracted=filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
    echo "<li>$key : $tracted</li>";  
}?>
        
    </body>
</html>