<?php
// Función para ordenar una lista utilizando el algoritmo Merge Sort
function merge_sort($arr) {
    // Si el arreglo tiene 0 o 1 elemento, está ordenado por definición, por lo que se devuelve tal cual
    if (count($arr) <= 1) {
        return $arr;
    }

    // Se divide el arreglo en dos mitades
    $mid = count($arr) / 2;
    $left_half = array_slice($arr, 0, $mid); // Mitad izquierda del arreglo
    $right_half = array_slice($arr, $mid);   // Mitad derecha del arreglo

    // Se aplica recursivamente merge_sort a cada mitad del arreglo
    $left_half = merge_sort($left_half);
    $right_half = merge_sort($right_half);

    // Se fusionan las mitades ordenadas utilizando la función merge
    return merge($left_half, $right_half);
}

// Función para fusionar dos arreglos ordenados en uno solo ordenado
function merge($left, $right) {
    $result = []; // Arreglo resultante de la fusión
    $left_index = 0; // Índice para recorrer el arreglo izquierdo
    $right_index = 0; // Índice para recorrer el arreglo derecho

    // Se compara y se agrega el elemento más pequeño de entre los dos arreglos en el arreglo resultante
    while ($left_index < count($left) && $right_index < count($right)) {
        if ($left[$left_index] < $right[$right_index]) {
            $result[] = $left[$left_index];
            $left_index++;
        } else {
            $result[] = $right[$right_index];
            $right_index++;
        }
    }

    // Se agregan los elementos restantes del arreglo izquierdo al arreglo resultante
    while ($left_index < count($left)) {
        $result[] = $left[$left_index];
        $left_index++;
    }

    // Se agregan los elementos restantes del arreglo derecho al arreglo resultante
    while ($right_index < count($right)) {
        $result[] = $right[$right_index];
        $right_index++;
    }

    return $result; // Se devuelve el arreglo resultante ordenado
}

// Verifica si se está enviando una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["lista_palabras"])) {
        // Se obtiene la lista de palabras ingresadas y se convierte en un arreglo
        $lista_palabras = explode(",", $_POST["lista_palabras"]);
        // Se ordena la lista de palabras utilizando merge_sort
        $lista_ordenada = merge_sort($lista_palabras);
        // Se muestra la lista original y la lista ordenada alfabéticamente
        echo "Lista original: " . implode(", ", $lista_palabras) . "<br>";
        echo "Lista ordenada alfabéticamente: " . implode(", ", $lista_ordenada);
    } else {
        echo "No se recibieron datos."; // Mensaje si no se reciben datos
    }
}
?>
