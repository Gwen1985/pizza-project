<?php

declare(strict_types=1);

class Order
{
    private string $authorFn;
    private string $authorLn;
    private string $email;
    private string $mobileNr;
    private string $address;
    private string $zipcode;
    private string $city;
    private string $product_name;
    private string $product_quantity;

    /**
     * Order constructor.
     * @param string $authorFn
     * @param string $authorLn
     * @param string $email
     * @param string $mobileNr
     * @param string $address
     * @param string $zipcode
     * @param string $city
     * @param string $product_name
     * @param string $product_quantity
     */
    public function __construct(string $authorFn, string $authorLn, string $email, string $mobileNr, string $address, string $zipcode, string $city, string $product_name, string $product_quantity)
    {
        $this->authorFn = $authorFn;
        $this->authorLn = $authorLn;
        $this->email = $email;
        $this->mobileNr = $mobileNr;
        $this->address = $address;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->product_name = $product_name;
        $this->product_quantity = $product_quantity;
    }

    /**
     * @return string
     */
    public function getAuthorFn(): string
    {
        return $this->authorFn;
    }

    /**
     * @return string
     */
    public function getAuthorLn(): string
    {
        return $this->authorLn;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getMobileNr(): string
    {
        return $this->mobileNr;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->product_name;
    }

    /**
     * @return string
     */
    public function getProductQuantity(): string
    {
        return $this->product_quantity;
    }

    public function savePost(): void
    {
        OrderPizzaPoster::save($this);
    }


}