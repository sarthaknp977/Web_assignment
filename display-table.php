<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-table.css">
</head>

<body>
    <?php

    try {
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db_13";
        $connection = mysqli_connect($serverName, $username, $password, $dbname);
        $selectQuery = "SELECT * FROM books_info";
        $result = mysqli_query($connection, $selectQuery);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="table-container">';
            echo "<h2>Book List</h2>";
            echo "<table class='table'>";
            echo "<tr><th>Book Code</th><th>Title</th><th>Author</th><th>Price(in $)</th><th>Page</th><th>Stock</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['book_code'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['page'] . "</td>";
                echo "<td>" . $row['stock'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo '</div';
        } else {
            echo "No records found.";
        }
    } catch (Exception $exception) {
        echo "Database Error: " . $exception->getMessage();
    }
    ?>
</body>

</html>