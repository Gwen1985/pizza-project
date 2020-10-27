<?php

declare(strict_types=1);

$firstname = $lastname = $email = $mobileNr = $bookingDate = $bookingMsg = "";

$firstnameErr = $lastnameErr = $emailErr = $mobileNrErr = $bookingDateErr = $bookingMsgErr = "";

$errorPrefix = '<p class="text-red-500 text-xs italic" >';
$errorSuffix = '</p >';
$errorRequiredText = 'Please fill out this field.';
$isFormValid = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['first-name'])) {
        $firstname = sanitizeData($_POST['first-name']);
    } else {
        $isFormValid = false;
        $firstnameErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['last-name'])) {
        $lastname = sanitizeData($_POST['last-name']);
    } else {
        $isFormValid = false;
        $lastnameErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['email'])) {
        $email = sanitizeData($_POST['email']);
    } else {
        $isFormValid = false;
        $emailErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['mobile-nr'])) {
        $mobileNr = sanitizeData($_POST['mobile-nr']);
    } else {
        $isFormValid = false;
        $mobileNrErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['booking-date'])) {
        $bookingDate = sanitizeData($_POST['booking-date']);
    } else {
        $isFormValid = false;
        $bookingDateErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['booking-msg'])) {
        $bookingMsg = sanitizeData($_POST['booking-msg']);
    } else {
        $isFormValid = false;
        $bookingMsgErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if ($isFormValid) {
        $booking = new Booking ("$firstname", "$lastname", "$email", "$mobileNr", "$bookingDate", "$bookingMsg" . '');
        $booking->savePost();

        // RESET FORM FIELDS
        $firstname = $lastname = $email = $mobileNr = $bookingDate = $bookingMsg = "";
    }

}


function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}