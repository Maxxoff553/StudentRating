<?php include_once $_SERVER['DOCUMENT_ROOT'].'/StudentRating/logic/logic.php';
?>
<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Рейтинг студентов</title>
  <link href="../src/css/bootstrap.min.css" rel="stylesheet">
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
          <li><a href="rating.php" class="nav-link px-2 text-white" id="rating_page">Рейтинг студентов</a></li>
          <li><a href="group.php" class="nav-link px-2 text-secondary" id="group_page">Группы</a></li>
          <li><a href="students.php" class="nav-link px-2 text-secondary" id="student_page">Студенты</a></li>
          <li><a href="grades.php" class="nav-link px-2 text-secondary" id="grades_page">Оценки</a></li>
          <li><a href="subject.php" class="nav-link px-2 text-secondary" id="subject_page">Предметы</a></li>
        </ul>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="rating.php" method="post">
          <h3 class="mt-2">Группа :</h3>
          <select class="form-select" name="group_id" id="group_choice" class="form-control mt-2" style="width: 20%;">
            <?php foreach ($page_data as $res) { ?>
              <option value="<?php echo $res->group_id; ?>" 
              <?php if($res->group_id === $group_choice) echo "selected='selected'"; ?>>
                <?php echo htmlspecialchars($res->group_name); ?>
              </option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-primary mt-2" name="rating">
            Построить рейтинг
          </button>
        </form>
        <!--Таблица рейтинга выбранной группы-->
        <table class="table shadow table-bordered mt-2 text-center">
          <thead class="table-dark">
            <tr>
              <th>Студенты</th>
              <?php foreach ($thead_data as $t_res) { ?>
                <th>
                  <?php echo htmlspecialchars($t_res->subject_name); ?>
                </th>
              <?php } ?>
            </tr>
          </thead>

          <tbody>
            <?php if ($rating_result  > 0) {
              foreach ($rating_result  as $rres) { ?>
                <tr>
                  <td>
                    <?php echo htmlspecialchars($rres->student_name); ?>
                  </td>
                  <?php foreach ($sub_psdnm as $sub) { ?>
                    <td>
                      <?php echo $rres->$sub; ?>
                    </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        <?php } ?>
      </div>
    </div>
  </div>
  
  <script src="../src/js/bootstrap.bundle.min.js"></script>
</body>

</html>