<?php
    //include 'functions.php';
    require_once 'autoload.php';
    require_once 'config.php';

    $modelForm = new RegisterForm($model);
    $viewForm = new ViewForm($modelForm);

    if (Request::isPost()) {
        $modelForm->load($_POST);
        if($modelForm->validate()) {
            //TODO $modelForm->save(); кооторый будет непосредственно сохранять (В БАЗУ или в файлы (на будущее)) данные.
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
            <div class="col-md-5">
                <div>
                    <?php // $viewForm->renderErrorsSummary() ?>
                    <?php //HtmlHelper::renderErrorsSummary($modelForm); ?>
                </div>
                <form method="POST" class="form-horizontal">
                    <?= $viewForm->textFieldRow('lastname') ?>
                    <?= HtmlHelper::textFieldRow($modelForm, 'firstname') ?>
                    <?= HtmlHelper::textFieldRow($modelForm, 'middlename') ?>
                    <?= HtmlHelper::textFieldRow($modelForm, 'birthday') ?>
                    <?= HtmlHelper::textFieldRow($modelForm, 'passport') ?>
                    <?= HtmlHelper::textFieldRow($modelForm, 'email') ?>
                    <button type="submit" class="btn btn-info" style="margin-bottom: 30px;">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
