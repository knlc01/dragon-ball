<?php

// URL de la API de Dragon Ball
$apiUrl = "https://dragonball-api.com/api/characters";
// Inicializar curl para la llamada a la API
$iniciarCURL = curl_init($apiUrl);
// Configurar curl para devolver la repuesta como una cadena
curl_setopt($iniciarCURL, CURLOPT_RETURNTRANSFER, true);
// Ejecutar la llamada a la API y almacenar la repuesta
$repuesta = curl_exec($iniciarCURL);
// Cerrar la sesión curl
curl_close($iniciarCURL);
// Decodificar la repuesta JSON en un array asociativo de php
$datos = json_decode($repuesta, true);
// Iniciar la sesión
session_start();
if (!isset($_SESSION['indiceActual'])) {
    $_SESSION['indiceActual'] = 0; // Establecer el índice actual en 0 si no está definido
}
// Obtener el índice actual
$indiceActual = $_SESSION['indiceActual'];
// Función para avanzar al sig personaje
function siguientePersonaje() {
    global $datos;
    if ($_SESSION['indiceActual'] < count($datos['items']) - 1) {
        $_SESSION['indiceActual']++;
    }
}
// Función para retoceder al personaje anterior
function anteriorPersonaje() {
    if ($_SESSION['indiceActual'] > 0) {
        $_SESSION['indiceActual']--;
    }
}
// Manejar las solicitudes de los botones
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'siguiente') {
        siguientePersonaje();
    } elseif ($_POST['accion'] == 'anterior') {
        anteriorPersonaje();
    }
}
//print_r($datos);//todos los personajes
// Obtener los detalles del personaje actual
$name =  $datos['items'][$_SESSION['indiceActual']]['name'];
$img = $datos['items'][$_SESSION['indiceActual']]['image'];
$description = $datos['items'][$_SESSION['indiceActual']]['description'];
$selected = $datos['items'][$_SESSION['indiceActual']]['id'];
$all = count($datos['items']);


?>