<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

use Arhitector\Yandex\Disk;

$token = '';
$disk = new Disk($token);

$message = '';
$files = [];

/*
|--------------------------------------------------------------------------
| ADD
|--------------------------------------------------------------------------
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    try {
        $tmpName = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];

        $resource = $disk->getResource($fileName);
        $resource->upload($tmpName, true);

        $message = 'Файл добавлен';

    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}

/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/
if (isset($_GET['delete'])) {
    try {
        $disk->getResource($_GET['delete'])->delete();
        $message = 'Файл удалён';

    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}

/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['replace_file'])) {
    try {
        $oldName = $_POST['old_name'];

        $disk->getResource($oldName)->upload(
            $_FILES['replace_file']['tmp_name'],
            true
        );

        $message = 'Файл заменён';

    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}

/*
|--------------------------------------------------------------------------
| READ
|--------------------------------------------------------------------------
*/
try {
    $collection = $disk->getResources(100, 0);

    foreach ($collection as $item) {
        if (is_object($item) && method_exists($item, 'getPath')) {
            $files[] = $item->getPath();
        }
    }

} catch (Exception $e) {
    $message = $e->getMessage();
}
?>
    <div style="padding:40px">
    <h1>CRUD Яндекс.Диск</h1>
        <?php if ($message): ?>
            <div style="color:green; margin-bottom:20px;">
            <?= htmlspecialchars($message) ?>
        </div>
        <?php endif; ?>

        <h2>Добавить файл</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <button type="submit">Загрузить</button>
    </form>
    <hr>
    <h2>Список файлов</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Имя</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        <?php foreach ($files as $path): ?>
            <tr>
                <td><?= htmlspecialchars(basename($path)) ?></td>
                <td>
                    <a href="?delete=<?= urlencode($path) ?>">
                        Удалить
                    </a>
                </td>
                <td>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="old_name" value="<?= htmlspecialchars($path) ?>">
                        <input type="file" name="replace_file" required>
                        <button type="submit">Заменить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
