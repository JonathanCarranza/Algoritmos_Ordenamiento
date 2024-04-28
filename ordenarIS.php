<?php
// Función para ordenar una lista de nombres utilizando el algoritmo Insertion Sort
function insertion_sort($arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i]; // Selecciona el elemento actual para compararlo e insertarlo en la posición correcta
        $j = $i - 1;
        // Mover los elementos del arreglo que son mayores que $key a una posición adelante de su posición actual
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j = $j - 1;
        }
        $arr[$j + 1] = $key; // Inserta $key en su posición correcta
    }
    return $arr; // Retorna el arreglo ordenado
}

// Verifica si se está enviando una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["lista_nombres"])) {
        $lista_nombres = explode(",", $_POST["lista_nombres"]); // Divide la cadena de nombres en un arreglo
        $lista_ordenada = insertion_sort($lista_nombres); // Ordena la lista de nombres
        // Imprime la lista original y la lista ordenada alfabéticamente
        echo "Lista original: " . implode(", ", $lista_nombres) . "<br>";
        echo "Lista ordenada alfabéticamente: " . implode(", ", $lista_ordenada);
    } else {
        echo "No se recibieron datos."; // Mensaje si no se reciben datos
    }
}
?>
