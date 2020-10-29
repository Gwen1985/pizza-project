<?php


declare(strict_types=1);

class Booking
{
//    const MAX_POSTS = 100;
    private string $authorFn;
    private string $authorLn;
    private string $email;
    private string $mobileNr;
    private string $bookingDate;
    private string $bookingMsg;


    /**
     * Booking constructor.
     * @param string $firstName
     * @param string $authorLn
     * @param string $email
     * @param string $mobileNr
     * @param string $bookingDate
     * @param string $bookingMsg
     * @throws Exception
     */
    public function __construct(string $authorFn, string $authorLn, string $email, string $mobileNr, string $bookingDate, string $bookingMsg)
    {
//        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));

        $this->authorFn = $authorFn;
        $this->authorLn = $authorLn;
        $this->email = $email;
        $this->mobileNr = $mobileNr;
        $this->bookingDate = $bookingDate;
        $this->bookingMsg = $bookingMsg;
//        $this->currentDate = $currentDate->format('Y-m-d H:i:s');

    }

//    public static function getPosts(): array
//    {
//        $bookings = [];
//
//        foreach (BookTablePoster::get() as $booking) {
//            $bookings[] = $booking;
//        }
//        return array_slice(array_reverse($bookings), 0, self::MAX_POSTS - 1);
//    }

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
    public function getMobile(): string
    {
        return $this->mobileNr;
    }

    /**
     * @return string
     */
    public function getBookingDate(): string
    {
        return $this->bookingDate;
    }

    /**
     * @return string
     */
    public function getBookingMsg(): string
    {
        return $this->bookingMsg;
    }

    public function savePost(): void
    {
        BookTablePoster::save($this);
    }

}