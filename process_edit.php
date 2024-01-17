<?php
    session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'travel');

    $id = $_GET['id'];
    $query = "SELECT * FROM book_form WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['booking_data'] = $row;
        header('location:edit.php');
    }else{

        header('location:book_list.php');
    }
    mysqli_close($connection);
?>
