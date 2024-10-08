<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}


include 'db.php';
$sql = "SELECT * FROM daftar_kepanitiaan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang, <?php echo $_SESSION['username']; ?></h1>
    <h2>Data Kepanitiaan</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Divisi</th>
            <th>Jabatan</th>
        </tr>

        <?php 
         if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["NIK"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["program_studi"] . "</td>";
                echo "<td>" . $row["divisi"] . "</td>";
                echo "<td>" . $row["jabatan"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data yang ditemukan</td></tr>";
        }
        ?>

    </table>

    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
