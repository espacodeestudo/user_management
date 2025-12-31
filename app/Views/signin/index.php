<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Login </title>
    <link rel="stylesheet" href="/assets/css/style.css">
  
    


</head>

<body>
    <div class="signin-wrapper">
        <div class="signin-container">
            <form action="/signin" method="POST" class="signin-form">
                <div class="signin-containerForm-text">
                    <h2>Login</h2>
                    <span>
                    <p>Ainda não possui uma conta?</p>
                    <a href="/signup">Cadastra-se</a>
                    </span>
                </div>
                <?php if(!empty($errors)): ?>
                    <div class="errors">
                        <?php foreach($errors as $error): ?>
                            <p class="error-message"><?= htmlspecialchars($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="container-input">
                    <label for="signinEmail">
                        Email
                    </label>
                    <input type="email" placeholder="Digite seu email" id="signinEmail" name="email">
                </div>
                  <div class="container-input">
                    <label for="signinPassword">
                        Senha
                    </label>
                    <input type="password" placeholder="Digite sua senha" id="signinPassword" name="password">
                </div>
                <div class="forgotPassword">
                    <a href="">Esqueceu a senha?</a>
                </div>
                <button class="btn btn-siginup">
                    <span>Entrar</span>
                </button>
            </form>
        </div>
      
    </div>
   
   
</body>

</html>