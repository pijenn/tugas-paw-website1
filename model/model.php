<?php
include 'db.php';

class Model {
    public function getKepanitiaan() {
        global $conn;
        $sql = "SELECT * FROM daftar_kepanitiaan";
        return $conn->query($sql);
    }
}
?>
