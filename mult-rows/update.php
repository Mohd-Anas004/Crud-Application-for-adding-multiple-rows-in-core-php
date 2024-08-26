<?php
include 'conn.php';


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $roll = $_POST['rollno'];
    $book_ids = $_POST['book_id'];
    $books = $_POST['book'];
    $authors = $_POST['author'];
    $prices = $_POST['price'];
    $bookid = count($book_ids);
    $bookname = count($books);
    // echo "<pre>";
    // var_dump($_POST);
    // die();

    $sql1 = "UPDATE student_details SET name = '$name', email = '$email', phone = '$phone', address = '$address', rollno = '$roll' WHERE id = '$id'";
    $result1 = mysqli_query($conn, $sql1);

    if (!$result1) {
        echo "Failed to update student details.";
        die();
    }

    $sqlDelete = "DELETE FROM book WHERE s_id = '$id'";
    $resultDelete = mysqli_query($conn, $sqlDelete);

    for ($i = 0; $i < $bookname; $i++) {
        $book = $books[$i];
        $author = $authors[$i];
        $price = $prices[$i];
        $bookid = $book_ids[$i];

        $sql2 = "INSERT INTO book (s_id, book, author, price) VALUES ('$id', '$book', '$author', '$price')";
        $result2 = mysqli_query($conn, $sql2);

        if (!$result2) {
            echo "Failed to update/insert book details.";
            die();
        }
    }


    header('Location: index.php');
    exit;
}
