<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $a = 4;
    $b = 10;
    $c = ($b - 5) * $a;
    echo "Result 1 = " . $c . "<BR>";
    echo 'Result 2 = ' . $c . '<BR>';
    echo "Result 3 = $c <BR>";
    echo 'Result 4 =  $c <BR>';
    echo "Result 4 =".($c+$b)."<BR>";
   ?>
</body>
</html>