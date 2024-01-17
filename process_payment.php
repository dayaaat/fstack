<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '', 'travel');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    $book_id = isset($_SESSION['booking_data']['id']) ? $_SESSION['booking_data']['id'] : null;
    unset($_SESSION['booking_data']);

    if ($book_id) {
        $request = "INSERT INTO payment(book_id, full_name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv) VALUES ('$book_id', '$full_name', '$email', '$address', '$city', '$state', '$zip_code', '$card_name', '$card_number', '$exp_month', '$exp_year', '$cvv')";
        mysqli_query($connection, $request);

                                                                                                                        
        $_SESSION['success_message'] = "Payment processed successfully.";
        header('location:book_list.php');
    } else {
        echo 'Invalid book_id.';
    }
} else {
    echo 'Invalid request method.';
}

?>
