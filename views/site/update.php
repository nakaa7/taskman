<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Обновить задачу</h1>
    <p class="lead">Тут вы можете обновить задачу.</p>
</div>
<?php if($result){ ?>
    <div class="alert alert-success" role="alert">
        Задача успешно обнавлена!
    </div>
<?php }  ?>
<?php if($error){ ?> 
    <?php foreach($error as $num => $message):?>
        <div class="alert alert-danger" role="alert"><?=$message?></div>
    <?php endforeach;?>
<?php }  ?>

<form method="post" action="/site/update/<?=$task->id?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="InputName">Имя</label>
        <input type="name" name="name" value="<?=$task->name?> "class="form-control" id="InputName" placeholder="Имя" required><small id="nameHelp" class="form-text text-muted">Введите свое имя.</small>

    </div>
    <div class="form-group">
        <label for="InputEmail1">Почта</label>
        <input type="email" name="email" value="<?=$task->email?>" class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Почта" required><small id="emailHelp" class="form-text text-muted">Введите адрес электронной почты.</small>
    </div>
    <div class="form-group">
        <label for="description">Введите описание задачи.</label>
        <textarea name="description" class="form-control" id="description" rows="3" required><?=$task->description?></textarea></div>
    <div class="form-group">
        <label for="InputFile">Загрузите картинку</label>
        <input type="file" name="image" class="form-control-file" id="InputFile" aria-describedby="fileHelp"><small id="fileHelp" class="form-text text-muted">Картинка должна быть размером 320х240px</small>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" <?=($task->status) ? "checked='checked'" : ""?>name="status" value="1" class="form-check-input">
            Выполнена
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
        
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 Предварительный просмотр!
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Предварительный просмотр!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="modal-body">
         <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
         </div>
        <div class="row"> 
            <div class="col"></div>
        </div> 
        <div class="row"> 
            <div class="col"><img src="" class="img-fluid" alt="Responsive image"></div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>