<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
  <div class="userD_wrapper">
    <div class="userD_container">
      <div class="userD_photo">
        <img src="/assets/img/userImg.jpeg" alt="">
      </div>

      <div class="userD_inf">
        <h2><?= htmlspecialchars($user->first_name . ' ' . $user->last_name) ?></h2>
        <p><?= htmlspecialchars($user->email) ?></p>

      </div>
      <div class="userD_container_btn">
        <form action="/dashboard/user/delete" method="POST">
          <button class=" btn_delete" type="submit">
            <i class="fa-solid fa-trash"></i>
          </button>
        </form>
        <form action="/logout" method="POST">
          <button class="btn_logout" type="submit">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </button>
        </form>
      </div>
    </div>

    <div class="userD_details">
      <div class="userD_card">
        <div class="userD_details_inf">
          <h3 class="userD_title">Dados pessoais</h3>
          <button class="btn_logout" id="editUser"> <i class="fa-regular fa-pen-to-square"></i></button>
        </div>



        <div class="userD_row">
          <span class="userD_label">Data de nascimento:</span>
          <span class="userD_value"><?= $user->birth_date ?? '-' ?></span>
        </div>

        <div class="userD_row">
          <span class="userD_label">Género:</span>
          <span class="userD_value"><?= $user->gender ?? '-' ?></span>
        </div>

        <div class="userD_row">
          <span class="userD_label">Nacionalidade:</span>
          <span class="userD_value"><?= $user->nationality ?? '-' ?></span>
        </div>

        <div class="userD_row">
          <span class="userD_label">Morada:</span>
          <span class="userD_value">
            <?= $user->address ?? '-' ?>
          </span>
        </div>

        <div class="userD_row last">
          <span class="userD_label">Número de telefone:</span>
          <span class="userD_value"><?= $user->phone ?? '-' ?></span>
        </div>


      </div>

    </div>


    <div class="userD_modal modal_closed">
      <div class="userD_modal_container">
        <form action="/dashboard/user" method="POST">
          <div class="userD_modal_closed">
            <button class="btn_closed" type="button">
              <i class="fa-solid fa-x"></i>
            </button>
          </div>
          <?php if (!empty($errors)): ?>
            <div class="errors">
              <?php foreach ($errors as $error): ?>
                <p class="error-message"><?= htmlspecialchars($error) ?></p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <?php if (!empty($success)): ?>
            <div class="alert-success">
              <p class="alert-message">

                <?= $success ?>
              </p>
            </div>
          <?php endif; ?>
          <div class="container-input">
            <label for="userD_FirstName">
              Primeiro nome
            </label>
            <input type="text" placeholder="Digite seu primeiro nome" id="userD_FirstName" name="first_name" value="<?= $user->first_name ?? '' ?>">
          </div>
          <div class="container-input">
            <label for="signuLastName">
              Último Nome
            </label>
            <input type="text" placeholder="Digite seu último nome" id="signuLastName" name="last_name" value="<?= $user->last_name ?? '' ?>">
          </div>
          <div class="container-input">
            <label for="userD_gender">
              Género
            </label>

            <select name="gender" id="" value="<?= $user->gender ?? '' ?>">
              <option value="" disabled selected>Seleciona uma opção</option>
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
            </select>

          </div>
          <div class="container-input">
            <label for="userD_birth_date">
              Data de Nascimento
            </label>
            <input type="date" placeholder="Digite sua data de nascimento" id="userD_birth_date" name="birth_date" value="<?= $user->birth_date ?? '' ?>">
          </div>
          <div class="container-input">
            <label for="userD_nationality">
              Nacionalidade
            </label>
            <input type="text" placeholder="Digite sua nacionalidade" id="userD_nationality" name="nationality" value="<?= $user->nationality ?? '' ?>">
          </div>
          <div class="container-input">
            <label for="userD_address">
              Morada
            </label>
            <input type="text" placeholder="Digite sua morada" id="userD_address" name="address" value="<?= $user->address ?? '' ?>">
          </div>
          <div class="container-input">
            <label for="userD_LastEmail">
              Email
            </label>
            <input type="email" placeholder="Digite seu email" id="userD_LastEmail" name="email" readonly value="<?= $user->email ?? '' ?>">
          </div>
          <div class="container-input">
            <label for="userD_Phone">
              Telefone
            </label>
            <input type="tel" placeholder="Digite seu número telefonico" id="userD_Phone" name="phone" value="<?= $user->phone ?? '' ?>">
          </div>

          <button class="btn btn-siginup" type="submit">
            <span>Salvar</span>
          </button>

        </form>
      </div>
    </div>
  </div>

  <script type="module" src="/assets/js/dashboardUser.js"></script>
</body>

</html>