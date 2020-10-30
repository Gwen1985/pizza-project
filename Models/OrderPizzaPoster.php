<?php

declare(strict_types=1);

class OrderPizzaPoster
{
    public static function openConnection(): PDO
    {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "pizza_project";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);

        return $pdo;
    }

    public static function save(Order $orders): void
    {
        try {
            $pdo = self::openConnection();
            $sql = "INSERT INTO ordertable (`fname`, `lname`, `email`, `mobile-nr`, `address`, `zipcode`, `city`, `productname`, `productquantity`) VALUES ('" . $orders->getAuthorFn() . "', '" . $orders->getAuthorLn() . "', '" . $orders->getEmail() . "', '" . $orders->getMobileNr() . "', '" . $orders->getAddress() . "', '" . $orders->getZipcode() . "', '" . $orders->getCity() . "', '" . $orders->getProductName() . "', '" . $orders->getProductQuantity() . "')";
            $handle = $pdo->prepare($sql);
            $handle->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";

        }
    }
}