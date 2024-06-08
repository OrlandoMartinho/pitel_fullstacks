<?php
// Obtém a URL da solicitação
$url = isset($_GET['url']) ? $_GET['url'] : '/';

// Define as rotas disponíveis
$routes = [
    '/' => 'HomeController',
    '/about' => 'AboutController',
    '/contact' => 'ContactController'
];

// Verifica se a rota solicitada existe
if (array_key_exists($url, $routes)) {
    // Inclui o controlador correspondente à rota
    include_once $routes[$url] . '.php';
} else {
    // Se a rota não existir, retorna um erro 404
    header("HTTP/1.0 404 Not Found");
    echo 'Error 404 - Page Not Found';
}
