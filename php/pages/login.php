<!--
 * Created by PhpStorm.
 * Author: Sebastian Reuter, Thomas Wolf
 * Date: 24.07.2017
 * Time: 14:10
 -->
    <html>
    <head>
    <meta charset="utf-8"/>
    <?php include("../template/head.template.php"); ?>
    <link href="../../css/login.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="container">
        <div class="card card-container">
            <h2 class='login_title text-center'>Anmeldung</h2>
            <hr>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <p class="input_title">Email</p>
                <input type="text" id="inputEmail" class="login_box" placeholder="verwaltung@b3-fuerth.de" required
                       autofocus>
                <p class="input_title">Passwort</p>
                <input type="password" id="inputPassword" class="login_box" placeholder="******" required>
                <button class="btn btn-lg btn-primary" type="submit">anmelden</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>


