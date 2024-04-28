<?php
function bubble_sort_descending($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] < $arr[$j+1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
            }
        }
    }
    return $arr;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["lista"])) {
        $lista_numeros = explode(",", $_POST["lista"]);
        $lista_numeros = array_map('intval', $lista_numeros); // Convertir elementos a enteros
        $lista_ordenada = bubble_sort_descending($lista_numeros);
        echo "Lista original: " . implode(", ", $lista_numeros) . "<br>";
        echo "Lista ordenada de forma descendente: " . implode(", ", $lista_ordenada);
    } else {
        echo "No se recibieron datos.";
    }
}
?>

