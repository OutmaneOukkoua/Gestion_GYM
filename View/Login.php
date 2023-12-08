<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="../Style/css/font-face.css" rel="Stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="../Style/vendor/bootstrap-4.1/bootstrap.min.css" rel="Stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../Style/css/theme.css" rel="Stylesheet" media="all">
    <script>
    function showPassword() {
      var passwordField = document.getElementById("floatingPassword");
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }

    window.addEventListener("load", function() {
      var emailField = document.getElementById("floatingInput");
      emailField.addEventListener("invalid", function() {
        if (emailField.validity.valueMissing) {
          emailField.setCustomValidity("Veuillez saisir votre Utilisateur");
        } else if (emailField.validity.typeMismatch) {
          emailField.setCustomValidity("Veuillez saisir une Utilisateur valide.");
        } else {
          emailField.setCustomValidity("");
        }
      });

      var passwordField = document.getElementById("floatingPassword");
      passwordField.addEventListener("invalid", function() {
        if (passwordField.validity.valueMissing) {
          passwordField.setCustomValidity("Veuillez saisir votre mot de passe.");
        } else {
          passwordField.setCustomValidity("");
        }
      });
    });
  </script>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../Style/images/icon/ICON11.PNG" alt="#">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" id="form">
                                <div class="form-group">
                                    <label for="floatingInput">Adresse e-mail</label>
                                    <input class="au-input au-input--full" type="text" name="User" placeholder="Email" value="<?= $login ?>" id="floatingInput" required>
                                    <span style="color:red"><?= $erreurlogin ?></span>
                                </div>

                                
                                <div class="form-group">
                                    <label for="floatingPassword">Mot de passe</label>
                                    <input class="au-input au-input--full" type="password" name="Password" placeholder="Password" value="<?= $password ?>" id="floatingPassword" required>
                                    <span style="color:red"><?= $erreurpass ?></span>
                                  </div>


                                <div class="login-checkbox">
                                    <label for="showPasswordCheckbox">
                                        <input type="checkbox" id="showPasswordCheckbox" name="" onclick="showPassword()">Afficher le mot de passe
                                    </label>
                                </div>
                                <div>
                                <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit" value="se connecter" id="login" name="Connect">
                                </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="../Style/vendor/jquery-3.2.1.min.js"></script>
    <script src="../Style/vendor/animsition/animsition.min.js"></script>
    <!-- Main JS-->
    <script src="../Style/js/main.js"></script>

</body>

</html>
<!-- end document-->