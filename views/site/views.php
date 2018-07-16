    <div class="form-group">
        <label for="InputName">Имя</label>
        <input type="name" name="name" value="<?=$task->name?>" disabled class="form-control" id="InputName" placeholder="Имя">

    </div>
    <div class="form-group">
        <label for="InputEmail1">Почта</label>
        <input type="email" name="email" value="<?=$task->email?>" disabled class="form-control" id="InputEmail1" aria-describedby="emailHelp" placeholder="Почта">
    </div>
    <div class="form-group">
        <label for="description">Описание задачи.</label>
        <textarea name="description" disabled class="form-control" id="description" rows="3"><?=$task->description;?></textarea>
    </div>
    <img src="<?=$task->img?>" class="img-fluid" alt="Responsive image">
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" name="status" <?=($task->status) ? 'checked': ''?> disabled class="form-check-input">
            Статус
        </label>
    </div>