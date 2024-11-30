<?php
include '../controller/controller.php';
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
    <h1>Selamat Datang, <?php echo $username; ?></h1>
    <h2>Data Kepanitiaan</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Divisi</th>
            <th>Jabatan</th>
            <th>Detail</th>
            <?php if (admin($role)) { ?>
                <th>Edit</th>
                <th>Delete</th>
            <?php } ?>
        </tr>

        <?php 
        if ($kepanitiaan->num_rows > 0) {
            while($row = $kepanitiaan->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["NIK"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["program_studi"] . "</td>";
                echo "<td>" . $row["divisi"] . "</td>";
                echo "<td>" . $row["jabatan"] . "</td>";
                echo "<td><a href='detail.php?id=" . $row["id"] . "'>Detail</a></td>";
                if (admin($role)) {
                    echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a></td>";
                }
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data yang ditemukan</td></tr>";
        }
        ?>
    </table>
    <?php if (admin($role)) { ?>
        <br>
        <a href="insert.php"><input type="button" value="Insert"></a>
        <br><br>
    <?php } ?>

    <br>
    
    <a href="../controller/logout.php"><input type="button" value="Logout"></a>
</body>
</html>
