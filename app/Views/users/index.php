<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Usuários</title>
</head>
<body>
    <h1>👥 Lista de Usuários</h1>
    
    <form action="/users/store" method="POST">
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Adicionar</button>
    </form>

    <ul>
        <?php foreach($users as $user): ?>
            <li><?= $user->name ?> - <?= $user->email ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
