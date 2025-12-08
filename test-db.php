<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

Model::init();

try {
    $result = Capsule::select('SELECT version()');
    echo "✅ Conexão OK!\n";
    echo "PostgreSQL: " . $result[0]->version . "\n";
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
}