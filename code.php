<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="container">
        <h1>Book Details</h1>
        <?php
        $err = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['title']) && !empty($_POST['title']) && trim($_POST['title'])) {
                $title = $_POST['title'];
            } else {
                $err['title'] = 'Enter book\'s title';
            }

            if (isset($_POST['book_code']) && !empty($_POST['book_code']) && trim($_POST['book_code'])) {
                $book_code = $_POST['book_code'];
            } else {
                $err['book_code'] = 'Enter book\'s code';
            }

            if (isset($_POST['author']) && !empty($_POST['author']) && trim($_POST['author'])) {
                $author = $_POST['author'];
            } else {
                $err['author'] = 'Enter author\'s name';
            }

            if (isset($_POST['price']) && !empty($_POST['price']) && trim($_POST['price'])) {
                $price = $_POST['price'];
            } else {
                $err['price'] = 'Enter the price';
            }

            if (isset($_POST['page']) && !empty($_POST['page']) && trim($_POST['page'])) {
                $page = $_POST['page'];
            } else {
                $err['page'] = 'Enter total number of pages';
            }

            if (isset($_POST['stock']) && !empty($_POST['stock']) && trim($_POST['stock'])) {
                $stock = $_POST['stock'];
            } else {
                $err['stock'] = 'Enter the amount left in stock';
            }

            if (count($err) == 0) {
                try {
                    $serverName = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "db_13";
                    $connection = mysqli_connect($serverName, $username, $password, $dbname);
                    $insertsql = "INSERT INTO books_info(title, book_code, author, price, page, stock)
                        VALUES ('$title', '$book_code', '$author', '$price', '$page', '$stock')";
                    mysqli_query($connection, $insertsql);
                    if ($connection->affected_rows == 1 && $connection->insert_id > 0) {
                        echo 'Record inserted successfully';
                    } else {
                        echo 'Record insert failed';
                    }
                } catch (Exception $exception) {
                    echo "Database Error: " . $exception->getMessage();
                }
            }
        }
        ?>
        <form method="POST" class="form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="title info-container">
                <label for="title">Title </label>
                <span class="error"><?php echo isset($err['title']) ? $err['title'] : ''; ?></span>
                <input type="text" placeholder="Enter title" id="title" name='title' value="<?php echo isset($title) ? $title : ''; ?>" />
            </div>

            <div class="code info-container">
                <label for="book_code">Book Code </label>
                <span class="error"><?php echo isset($err['book_code']) ? $err['book_code'] : ''; ?></span>
                <input type="text" placeholder="Enter code" id="book_code" name='book_code' value="<?php echo isset($book_code) ? $book_code : ''; ?>" />
            </div>
            <div class="author info-container">
                <label for="author">Author</label>
                <span class="error"><?php echo isset($err['author']) ? $err['author'] : ''; ?></span>
                <input type="text" placeholder="Enter author" id="author" name='author' value="<?php echo isset($author) ? $author : ''; ?>" />
            </div>
            <div class="price info-container">
                <label for="price">Price</label>
                <span class="error"><?php echo isset($err['price']) ? $err['price'] : ''; ?></span>
                <input type="text" placeholder="Enter price" id="price" name='price' value="<?php echo isset($price) ? $price : ''; ?>" />
            </div>
            <div class="page info-container">
                <label for="page">Page</label>
                <span class="error"><?php echo isset($err['page']) ? $err['page'] : ''; ?></span>
                <input type="text" placeholder="Enter page" id="page" name='page' value="<?php echo isset($page) ? $page : ''; ?>" />
            </div>
            <div class="stock info-container">
                <label for="stock">Stock</label>
                <span class="error"><?php echo isset($err['stock']) ? $err['stock'] : ''; ?></span>
                <input type="text" placeholder="Enter stock" id="stock" name='stock' value="<?php echo isset($stock) ? $stock : ''; ?>" />
            </div>
            <div class="btn-container">
                <input class="clear btn" id="clear" type="reset" value="Clear" />
                <button><a class="" href="/Php/PHP_library/display-table.php" target="_blank">View Table</a></button>
                <input class="submit btn" id="submit" type="submit" value="Enter" />
            </div>
        </form>
    </div>
</body>

</html>