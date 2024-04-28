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
        echo "<h2>Book List</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Title</th><th>Book Code</th><th>Author</th><th>Price</th><th>Page</th><th>Stock</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['book_code'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['page'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
} catch (Exception $exception) {
    echo "Database Error: " . $exception->getMessage();
}
