<?php
require_once 'secure.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$student = (new StudentMap())->findById($id);
$header = (($id) ? 'Редактировать данные' : 'Добавить') . ' Студенты';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?= $header; ?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-student.php">Студенты</a></li>
        <li class="active"><?= $header; ?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-user.php" method="POST">
        <?php require_once '_formUser.php'; ?>
        <div class="form-group">
            <label>Роль</label>
            <select class="form-control" name="role_id">
                <?= Helper::printSelectOptions($user->role_id, $userMap->arrRoles()); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Отделение</label>
            <select class="form-control" name="gruppa_id">
                <?= Helper::printSelectOptions($student->gruppa_id, (new GruppaMap())->arrGruppas()); ?>
            </select>
        </div>
        <div class="form-group">
            <label>num_zach</label>
            <input type="text" class="form-control" name="num_zach" value="<?= $num_zach->num_zach; ?>">
        </div>
        <div class="form-group">
            <label>Заблокировать</label>
            <div class="radio">
                <label>
                    <input type="radio" name="active" value="1" <?= ($user->active) ? 'checked' : ''; ?>> Нет
                </label> &nbsp;
                <label>
                    <input type="radio" name="active" value="0" <?= (!$user->active) ? 'checked' : ''; ?>> Да
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="saveStudent" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>