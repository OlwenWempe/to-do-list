<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['delete'])) {
    $sql = "DELETE FROM " . $to_delete . " WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    if (isset($_POST['supp']) && !empty($_POST['supp'])) {
        foreach ($_POST['supp'] as $id) {
            $stmt->execute(['id' => $id]);
        }
    } else {
        $stmt->execute(['id' => $post->id]);
    }
}