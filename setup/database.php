<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Core\Model;


Model::init();

echo "🔧 Configurando banco de dados...\n\n";

try {
    // Verifica e remove a tabela se já existir
    if (Capsule::schema()->hasTable('users')) {
        Capsule::schema()->drop('users');
        echo "🗑️  Tabela 'users' removida\n";
    }

    
    Capsule::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
    });

    echo "✅ Tabela 'users' criada com sucesso\n";

    // Inserir dados de teste
    $now = date('Y-m-d H:i:s');
    
    Capsule::table('users')->insert([
        [
            'name' => 'Yuran Simao',
            'email' => 'yuran@example.com',
            'created_at' => $now,
            'updated_at' => $now
        ],
        [
            'name' => 'Maria Silva',
            'email' => 'maria@example.com',
            'created_at' => $now,
            'updated_at' => $now
        ],
        [
            'name' => 'João Costa',
            'email' => 'joao@example.com',
            'created_at' => $now,
            'updated_at' => $now
        ],
    ]);

    echo "📝 3 usuários de teste inseridos\n";
    echo "\n✨ Setup completo!\n";
    echo "🚀 Acesse: http://localhost:8000/users\n";

} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage() . "\n";
}