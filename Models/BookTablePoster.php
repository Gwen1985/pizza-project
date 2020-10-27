<?php


class BookTablePoster
{
    public static function openConnection(): PDO
    {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "pizza-project";

        $driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        // Try to understand what happens here
        $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);

        // Why we do this here
        return $pdo;
    }

    public static function save(BookTablePoster $bookingTable): void
    {
        try {
            $pdo = self::openConnection();
            $sql = "INSERT INTO customers (`fname`, `lname`, `email`, `mobile-nr`, `bookingdate`, 'bookingmsg') VALUES ('" . $bookingTable->getAuthorFn() . "', '" . $bookingTable->getAuthorLn() . "', '" . $bookingTable->getEmail() . "', '" . $bookingTable->getMobile() . "', '" . $bookingTable->getBookingDate() . "', " . $bookingTable->getBookingMsg() . "')";
            $handle = $pdo->prepare($sql);
            $handle->execute();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    public static function get()
    {
        $data = [];
        try {
            $pdo = self::openConnection();
            $sql = "SELECT * FROM customers";
            $handle = $pdo->prepare($sql);
            $handle->execute();
            $data = $handle->fetchAll();
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }

        return $data;

    }
}