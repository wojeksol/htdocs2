<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php

        echo "Pierwszy skrypt PHP!<br><br>";


        $liczba = 0;
        if ($liczba < 0) {
            echo "Wartość zmienej \$liczba jest mniejsza od zera.";
        }
        else if ($liczba > 0) {
            echo "Wartość zmienej \$liczba jest większa od zera.";
        }
        else {
            echo "Wartość zmienej \$liczba jest równa zero.";
        }
    ?>

</body>
</html>