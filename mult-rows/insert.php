<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $roll = $_POST['rollno'];
    $books = $_POST['book'];
    $authors = $_POST['author'];
    $prices = $_POST['price'];

    $book_count = count($books);
    $author_count = count($authors);
    $price_count = count($prices);

    // echo "<pre>";
    // print_r($books);
    // die();

    $sql1 = "INSERT INTO student_details (name, email, phone, address, rollno) VALUES ('$name', '$email', '$phone', '$address', '$roll')";
    $result = mysqli_query($conn, $sql1);

    if ($result) {
        $stu_id = $conn->insert_id;

        if ($book_count > 0 || $author_count > 0 || $price_count > 0) {
            for ($i = 0; $i < $book_count; $i++) {
                $book = $books[$i];
                $author = $authors[$i];
                $price = $prices[$i];

                $sql2 = "INSERT INTO book (s_id, book, author, price) VALUES ('$stu_id', '$book', '$author', '$price')";
                $result2 = mysqli_query($conn, $sql2);
            }

            if (!$result2) {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
            }
        } else {
            header('location:create.php?message=Please fill all the  details');
            die();
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
}
header('location:index.php');
