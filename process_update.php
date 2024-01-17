<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('db_connection.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $id = $_POST['id'];


    $updateQuery = "UPDATE book_form SET 
                    name='$name', email='$email', phone='$phone', address='$address',
                    location='$location', guests='$guests', arrivals='$arrivals', leaving='$leaving'
                    WHERE id=$id";

    if (mysqli_query($connection, $updateQuery)) {
        $_SESSION['success_message'] = "Booking updated successfully.";
    } else {
        $_SESSION['error_message'] = "Error updating booking: " . mysqli_error($connection);
    }

    header('location: book_list.php');
    exit();
} else {
    header('location: book_list.php');
    exit();
}
?>
