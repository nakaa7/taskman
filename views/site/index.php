<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Задачи</h1>
    <p class="lead">Это все ваши задачи.</p>
</div>
<table class="table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Имя</th>
          <th scope="col">Email</th>
          <th scope="col">Описание</th>
          <th scope="col">Картинка</th>
          <th scope="col">Статус</th>
        </tr>
    </thead>
        <?php foreach ($taskList as $value):?>
            <tr>
                <th scope="row"><?=$value->id?></th>
                <td><?=$value->name?></td>
                <td><?=$value->email?></td>
                <td><?= substr($value->description, 0,300)?></td>
                <td>
                    <?php 
                    if(!is_dir(ROOT . $value->img) && file_exists(ROOT . $value->img)){?>
                        <img src="<?=$value->img?>" style = "width:100px" class="rounded float-left">
                    <?php } ?>
                </td>
                <td><?=($value->status) ? 'Закрыта' : 'Новая'?></td>
            </tr>
        <?php endforeach;?>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>