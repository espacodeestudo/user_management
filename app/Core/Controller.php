<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        extract($data);
        
        $viewPath = __DIR__ . "/../Views/$view.php";
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            http_response_code(404);
            echo "View não encontrada: $view";
        }
    }
}