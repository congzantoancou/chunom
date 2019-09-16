<?php
include_once"config/database.php";
spl_autoload_register(function($class_name){
    require './app/models/'. $class_name .'.php';
});
$objCharacters = new Character();

if (isset($_POST['glyph'])) {
    $optional = array(
        "part1" => $_POST['part1'],
        "part2" => $_POST['part2'],
        "part3" => $_POST['part3'],
        "part4" => $_POST['part4']
    );


    $query = $objCharacters->addItem(
        $_POST['glyph'],
        $_POST['radical'],
        $_POST['pronounce'],
        $_POST['classify'],
        $_POST['phonetic'],
        $_POST['semantic'],
        $_POST['layout'],
        $optional);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add result</title>
</head>
<body>
    <h1>Add result</h1>
    <?php if ($query) {
        echo '<p>The request have sent.</p>';
    } else {
        echo '<p>Somthing went wrong.</p>';
    }
    ?>
    
    <a href="index">Goto home page</a>
</body>
</html>