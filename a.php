<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
    $ages = array('bob'=>20,'peter'=>35);

    echo "1 - ".$ages['bob']."<BR>";
    echo "2 - ".$ages['peter']."<BR>";

    $ages['lek']= 18 ;
    $ages['ying']= 42 ;

    echo "3 - " . ($ages['lek'] + $ages['peter']) . "<BR>";
    $ages['peter'] = $ages['bob']- $ages['lek'];
    echo "4 - ". $ages['peter']. "<BR>";
    ?>
</body>
</html>