<?php

declare(strict_types=1);

namespace WASENTO\OtpWasento;

use WASENTO\OtpWasento\Repositories\OtpWasentoRepository;

/** @package WASENTO\OtpWasento */
class OtpWasentoApi
{
    /**
     * Get Countries
     *
     * @return     OtpWasentoRepository  The otp wasento repository.
     */
    public function countries()
    {
        return (new OtpWasentoRepository)->countries();
    }

    /**
     * Request OTP
     *
     * @param      string  $phone    The phone
     * @param      string  $country  The country
     * @param      string  $message  The message
     *
     * @return     OtpWasentoRepository  The otp wasento repository.
     */
    public function requestOtp($phone, $country, $message)
    {
        return (new OtpWasentoRepository)->requestOtp($phone, $country, $message);
    }

    /**
     * Verify OTP
     *
     * @param      string  $requestId  The request identifier
     * @param      string  $code       The code
     */
    public function verifyOtp($requestId, $code)
    {
        return (new OtpWasentoRepository)->verifyOtp($requestId, $code);
    }
}
