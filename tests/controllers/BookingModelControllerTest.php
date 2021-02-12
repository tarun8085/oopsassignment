<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class BookingModelControllerTest extends TestCase {

    public function testSeatsAvailablity(): void {
        $seatQuotaModal = new Models\SeatQuotaModel();

        /*
         * company_id: int, ex 3
         * model_id : int, ex 2
         * seat_category_id : int, ex 1
         */
        $seatQuota = $seatQuotaModal->getSeatQuota(3, 2, 1);

        $bookingModal = new Models\BookingModel();
        $bookingCount = $bookingModal->getBookingCount(3, 2, 1);

        $expectedCount = $seatQuota[0]['seat'];

        $this->assertLessThan(
                $expectedCount,
                $bookingCount[0]['cnt'], "Seats are available..."
        );
    }

}
