<?php
    $connection = mysqli_connect('localhost', 'root', '', 'travel');

    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM book_form WHERE id = $id";
    mysqli_query($connection, $deleteQuery);
    mysqli_close($connection);
    header('location:book_list.php'); 

?>
