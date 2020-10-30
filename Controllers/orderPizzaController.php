<?php

declare(strict_types=1);

$firstname = $lastname = $email = $mobileNr = $address = $zipcode = $city = $productname = $productquantity = "";

$firstnameErr = $lastnameErr = $emailErr = $mobileNrErr = $addressErr = $zipcodeErr = $cityErr = $productnameErr = $productquantityErr = "";

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

    if (!empty($_POST['address'])) {
        $address = sanitizeData($_POST['address']);
    } else {
        $isFormValid = false;
        $addressErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['zipcode'])) {
        $zipcode = sanitizeData($_POST['zipcode']);
    } else {
        $isFormValid = false;
        $zipcodeErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['city'])) {
        $city = sanitizeData($_POST['city']);
    } else {
        $isFormValid = false;
        $cityErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['productname'])) {
        $productname = sanitizeData($_POST['productname']);
    } else {
        $isFormValid = false;
        $productnameErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }

    if (!empty($_POST['productquantity'])) {
        $productquantity = sanitizeData($_POST['productquantity']);
    } else {
        $isFormValid = false;
        $productquantityErr = $errorPrefix . $errorRequiredText . $errorSuffix;
    }


    if ($isFormValid) {
        $booking = new Order ("$firstname", "$lastname", "$email", "$mobileNr", "$address", "$zipcode", "$city", "$productname", "$productquantity" . '');
        $booking->savePost();

        // RESET FORM FIELDS
        $firstname = $lastname = $email = $mobileNr = $address = $zipcode = $city = $productname = $productquantity = "";
    }

}


function sanitizeData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}