<?php
    include 'functions.php';
    require_once 'autoload.php';
    $attributes = getDefaultValues();
    $errors = [];
    if (isPost()) {
        $attributes = fillAttributes($_POST);
        $errors = validate($attributes);
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
        <? if (isPost() && empty($errors)): ?>
            <p>Ваши данные успешно сохранены.</p>
        <? else: ?>
        <h1>Регистрация</h1>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <ul>
                    <? foreach($errors as $error): ?>
                        <li><?= $error ?></li>
                    <? endforeach; ?>
                    </ul>
                </div>
                <form method="POST">
                    <div class="form-group">
                        <label for="last-name"><?= getLabels()['last-name'] ?>:</label>
                        <input type="text" class="form-control" name="last-name" value="<?= $attributes['last-name'] ?>" placeholder="Ваша фамилия"/>
                    </div>
                    <div class="form-group">
                        <label for="first-name"><?= getLabels()['first-name'] ?>:</label>
                        <input type="text" class="form-control" name="first-name" value="<?= $attributes['first-name'] ?>" placeholder="Ваше имя"/>
                    </div>
                    <div class="form-group">
                        <label for="middle-name"><?= getLabels()['middle-name'] ?>:</label>
                        <input type="text" class="form-control" name="middle-name" value="<?= $attributes['middle-name'] ?>" placeholder="Ваше отчество"/>
                    </div>
                    <div class="form-group">
                        <label for="birthday"><?= getLabels()['birthday'] ?>:</label>
                        <input type="text" class="form-control" name="birthday" value="<?= $attributes['birthday']  ?>" placeholder="Дата рождения"/>
                    </div>
                    <div class="form-group">
                        <label for="passport"><?= getLabels()['passport'] ?></label>
                        <input type="text" class="form-control" name="passport" value="<?= $attributes['passport'] ?>" placeholder="Номер вашего паспорта"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><?= getLabels()['email'] ?>:</label>
                        <input class="form-control" name="email" value="<?= $attributes['email'] ?>" placeholder="Вaш e-mail"/>
                    </div>
                    <button type="submit" class="btn btn-info">Зарегистрироваться</button>
                </form>
            </div>
        </div>
        <? endif; ?>
    </div>
</body>
</html>
