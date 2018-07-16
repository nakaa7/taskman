<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Создать задачу</h1>
    <p class="lead">Тут вы можете создать задачу.</p>
</div>
<?php if($result){ ?>
    <div class="alert alert-success" role="alert">
        Задача успешно создана!
    </div>
<?php }  ?>
<?php if($error){ ?> 
    <?php foreach($error as $num => $message):?>
        <div class="alert alert-danger" role="alert"><?=$message?></div>
    <?php endforeach;?>
<?php }  ?>


<form method="post" action="/site/create/" enctype="multipart/form-data">
    <div class="form-group">
        <label for="InputName">Имя</label>
        <input type="name" name="name" class="form-control" id="InputName" placeholder="Имя" required><small id="nameHelp" class="form-text text-muted">Введите свое имя.</small>

    </div>
    <div class="form-group">
        <label for="InputEmail1">Почта</label>
        <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Почта" required><small id="emailHelp" class="form-text text-muted">Введите адрес электронной почты.</small>

    </div>
    <div class="form-group">
        <label for="description">Введите описание задачи.</label>
        <textarea name="description" class="form-control" id="description" rows="3" required></textarea></div>
    <div class="form-group">
        <label for="InputFile">Загрузите картинку</label>
        <input type="file" name="image" class="form-control-file" id="InputFile" aria-describedby="fileHelp"><small id="fileHelp" class="form-text text-muted">Картинка должна быть размером 320х240px</small>
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
