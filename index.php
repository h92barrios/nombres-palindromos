<?php

// Evalua el parametro name atravez del method GET en caso de existir se modifica a minuscula
// con mb_strtolower() y se eliminan los espacion del inicio y del fin con trim() y se almacena
// en $name. en el caso de no pasar el parametro name por GET se le asigna el valor NULL
// a la variable $name.
(isset($_GET['name'])) ? $name = trim( mb_strtolower( $_GET['name'] ) ) : $name = null;

$array_explode = explode(" ", $name);

$name_length = count($array_explode);

function one_name($string_name) {

    $name_reverse = join("", array_reverse(str_split($string_name)));
    $result = "";

    if ($name_reverse != $string_name) {
        $result .= '<p>' . $string_name . ' = ' . join("", array_reverse(str_split($string_name))) . '<span class="text-danger">  no es pal&iacute;ndromo</span></p>';
    } else {
        $result .= '<p>' . $string_name . ' = ' . join("", array_reverse(str_split($string_name))) . '<span class="text-success"> es pal&iacute;ndromo</span></p>';
    }

    return $result;

}

$result = "";

if ($name_length >= 2) {

    function more_name($array_name) {
        
        $i = 0;
        do {
            $result .= one_name($array_name[$i]);
            $i++;
        } while ($i < count($array_name));

        return $result;

    }

    (!is_null($name)) && ($array_name = $array_explode) && $result .= more_name( $array_name );

}

($name_length === 1 && !is_null($name)) && $result .= one_name( $name );

echo '<!DOCTYPE html>
<html lang="es-VE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.25">
    <title>Proyecto PHP | Palabras pal&iacute;ndromas</title>
    <link href="img.png" rel="icon">
    <style>
        input[type="text"] {
            width: 240px;
        }
        p {
            margin: 0.6em 0;
        }

        .text-danger {
            color: tomato;
        }

        .text-success {
            color: green;
        }
    </style>
</head>
<body>
    <section>
        <h1>Nombre Pal&iacute;ndromos</h1>
        <form action="/" method="get">
            <input type="text" name="name" id="name" placeholder="Ingresa el nombre Ej. Juan Pablo">
            <input type="submit" value="Enviar">
        </form>
    </section>

    <section>'. $result . '</section>
</body>
</html>';

?>

