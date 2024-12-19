<?php

$directory = __DIR__; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['rename'])) {
        $oldName = $_POST['old_name'];
        $newName = $_POST['new_name'];
        if (rename($directory . '/' . $oldName, $directory . '/' . $newName)) {
            echo "Файл переименован успешно.";
        } else {
            echo "Ошибка при переименовании файла.";
        }
    } elseif (isset($_POST['delete'])) {
        $fileToDelete = $_POST['file_name'];
        if (unlink($directory . '/' . $fileToDelete)) {
            echo "Файл удален успешно.";
        } else {
            echo "Ошибка при удалении файла.";
        }
    }
}


$files = array_diff(scandir($directory), array('..', '.', '.htaccess'));

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление файлами</title>
</head>
<body>
    <h1>Содержимое папки: <?php echo $directory; ?></h1>
    <table border="1">
        <tr>
            <th>Имя файла</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($files as $file): ?>
            <?php if (preg_match('/.(jpg|jpeg|png|gif)$/i', $file)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($file); ?></td>
                    <td>
                       
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="old_name" value="<?php echo htmlspecialchars($file); ?>">
                            <input type="text" name="new_name" placeholder="Новое имя" required>
                            <input type="submit" name="rename" value="Переименовать">
                        </form>
                      
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="file_name" value="<?php echo htmlspecialchars($file); ?>">
                            <input type="submit" name="delete" value="Удалить" onclick="return confirm('Вы уверены, что хотите удалить этот файл?');">
                        </form>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
