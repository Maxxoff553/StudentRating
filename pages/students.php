<?php include_once '../logic/logic.php';
?>
<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Рейтинг студентов</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="40" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M22 9L12 4L2 9L12 14L22 9ZM22 9V15M19 10.5V16.5L12 20L5 16.5V10.5" stroke="#000000"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="rating.php" class="nav-link px-2 text-secondary" id="rating_page">Рейтинг студентов</a></li>
          <li><a href="group.php" class="nav-link px-2 text-secondary" id="group_page">Группы</a></li>
          <li><a href="students.php" class="nav-link px-2 text-white" id="student_page">Студенты</a></li>
          <li><a href="grades.php" class="nav-link px-2 text-secondary" id="grades_page">Оценки</a></li>
          <li><a href="subject.php" class="nav-link px-2 text-secondary" id="subject_page">Предметы</a></li>
        </ul>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table shadow table-bordered mt-4 text-center">
          <thead class="table-dark">
            <tr>
              <th>id</th>
              <th class="">Студенты</th>
              <th class="">Группа</th>
              <th class="col-2">Действия</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($page_data as $res) { ?>
              <tr>
                <td>
                  <?php echo $res->student_id; ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($res->student_name); ?>
                </td>
                <td>
                  <?php echo htmlspecialchars($res->group_name); ?>
                </td>
                <td>
                  <a href="?id=<?php echo $res->student_id; ?>" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#edit<?php echo $res->student_id; ?>">Изменить</a>
                  <a href="" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete<?php echo $res->student_id; ?>">Удалить</a>
                </td>
              </tr>
              <!--Окно обновления строки-->
              <div class="modal fade" id="edit<?php echo $res->student_id; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Изменить запись</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="?id=<?php echo $res->student_id; ?>" method="post">
                        <div class="form-group">
                          <small>Имя студента</small>
                          <input type="text" class="form-control" name="student_name"
                            value="<?php echo $res->student_name; ?>">
                          <input type="hidden" name="student_id" value="<?php echo $res->student_id; ?>">
                          <small>Группа студента</small>
                          <select class="form-select" name="group_id" class="form-control">
                            <?php foreach ($select_data as $s_res) { ?>
                              <option value="<?php echo $s_res->group_id; ?>" 
                              <?php if($s_res->group_id === $res->group_id) echo "selected='selected'"; ?>>
                                <?php echo $s_res->group_name; ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="edit">
                            Изменить
                          </button>
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Закрыть
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--Окно удаления строки-->
              <div class="modal fade" id="delete<?php echo $res->student_id; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        Удалить запись №<?php echo $res->student_id; ?>?
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <form action="?id=<?php echo $res->student_id; ?>" method="post">
                        <input type="hidden" name="student_id" value="<?php echo $res->student_id; ?>">
                        <button type="submit" class="btn btn-danger" name="delete">
                          Удалить
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Закрыть
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </tbody>
        </table>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#create">
          Создать
        </button>
      </div>
    </div>
  </div>
  <!--Окно создания новой записи в таблицу-->
  <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Добавить запись в таблицу</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <small>Имя студента</small>
              <input type="text" class="form-control" name="student_name">
              <small>Группа студента</small>
              <select class="form-select" name="group_id" class="form-control">
                <?php foreach ($select_data as $s_res) { ?>
                  <option value="<?php echo $s_res->group_id; ?>">
                    <?php echo $s_res->group_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="add">
                Сохранить
              </button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Закрыть
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>