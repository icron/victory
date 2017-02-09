<?php
    //include 'functions.php';
    require_once 'autoload.php';

    $form = new RegisterForm();
    if (Request::isPost()) {
        $form->load($_POST);
        if($form->validate()) {
           header('Location: index.php');
        }
    }

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title>Форма</title>
</head>
<body>
    <div class="container">
        <h1>Регистрация</h1>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <?= HtmlHelper::renderErrorsSummary($form); ?>
                </div>
                <form method="POST">
                    <?= HtmlHelper::textFieldRow($form, 'lastname') ?>
                    <button type="submit" class="btn btn-info">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>