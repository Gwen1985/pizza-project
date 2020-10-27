<?php


declare(strict_types=1);

class Booking extends \BookTablePoster
{

    const MAX_POSTS = 5;
    private string $authorFn;
    private string $authorLn;
    private string $email;
    private int $mobileNr;
    private string $bookingDate;
    private string $bookingMsg;


    /**
     * Booking constructor.
     * @param string $authorFn
     * @param string $authorLn
     * @param string $email
     * @param int $mobileNr
     * @param string $bookingDate
     * @param string $bookingMsg
     * @throws Exception
     */
    public function __construct(string $authorFn, string $authorLn, string $email, int $mobileNr, string $bookingDate, string $bookingMsg)
    {
        $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));

        $this->authorFn = $authorFn;
        $this->authorLn = $authorLn;
        $this->email = $email;
        $this->content = $mobileNr;
        $this->postdate = $currentDate->format('Y-m-d H:i:s');
        $this->bookingMsg = $bookingMsg;

    }

    public static function getPosts(): array
    {
        $bookings = [];

        foreach (BookTablePoster::get() as $booking) {
            $bookings[] = $booking;
        }
        return array_slice(array_reverse($bookings), 0, self::MAX_POSTS - 1);
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
    public function getTitle(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getMobile(): int
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
        require $this->bookingMsg;
    }

    public function savePost(): void
    {
        BookTablePoster::save($this);
    }

}