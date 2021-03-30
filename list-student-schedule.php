<?php
require_once 'secure.php';
//if (!Helper::can('admin') && !Helper::can('manager')) {
//    header('Location: 404.php');
//    exit();
//}
$header = 'Расписание и планы студента';
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$count = (new StudentMap())->count();
$students = (new LessonPlanMap())->findStudent($page * $size - $size, $size);
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?= $header; ?></h1>
                <ol class="breadcrumb">
                    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li class="active"><?= $header; ?></li>
                </ol>
            </section>
            <?php if ($students) : ?>
                <div class="box-body">
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>Ф.И.О. студента</th>
                                <th>группа</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <td><?= $student->fio; ?></td>
                                    <td><?= $student->gruppa; ?></td>
                                    <td>
                                        <a href="list-plan.php?id=<?= $student->user_id; ?>" title="План студента"><i class="fa fa-table"></i></a>&nbsp;
                                        <a href="list-schedule.php?id=<?= $student->user_id; ?>" title="Расписание студента"><i class="fa fa-calendar-plus-o"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page, $size); ?>
                </div>
            <?php else : ?>
                <div class="box-body">
                    <p>Студенты не найдены</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>