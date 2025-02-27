<?php

// Предполагается, что $directory уже определен и безопасен
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Проверяем, был ли запрос методом POST
    try { // Начинаем блок обработки исключений
        if (isset($_POST['rename'])) { // Проверяем, было ли отправлено действие переименования
            // Проверка на существование файла
            if (!file_exists($directory . '/' . $_POST['old_name'])) { // Проверяем, существует ли файл с старым именем
                throw new Exception("Файл не найден."); // Если файл не найден, выбрасываем исключение с сообщением
            }
            $oldName = $_POST['old_name']; // Получаем старое имя файла из POST-запроса
            $newName = $_POST['new_name']; // Получаем новое имя файла из POST-запроса
            if (rename($directory . '/' . $oldName, $directory . '/' . $newName)) { // Пытаемся переименовать файл
                echo "Файл переименован успешно."; // Если переименование прошло успешно, выводим сообщение об успехе
            } else {
                throw new Exception("Ошибка при переименовании файла."); // Если переименование не удалось, выбрасываем исключение
            }
        } elseif (isset($_POST['delete'])) { // Проверяем, было ли отправлено действие удаления
            $fileToDelete = $_POST['file_name']; // Получаем имя файла для удаления из POST-запроса
            if (!file_exists($directory . '/' . $fileToDelete)) { // Проверяем, существует ли файл для удаления
                throw new Exception("Файл не найден."); // Если файл не найден, выбрасываем исключение с сообщением
            }
            if (unlink($directory . '/' . $fileToDelete)) { // Пытаемся удалить файл
                echo "Файл удален успешно."; // Если удаление прошло успешно, выводим сообщение об успехе
            } else {
                throw new Exception("Ошибка при удалении файла."); // Если удаление не удалось, выбрасываем исключение
            }
        }
    } catch (Exception $e) { // Обрабатываем исключения, если они были выброшены
        echo $e->getMessage(); // Выводим сообщение об ошибке
    }
}
</body>
</html>
