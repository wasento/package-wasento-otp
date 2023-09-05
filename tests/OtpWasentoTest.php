<?php

declare(strict_types=1);

namespace WASENTO\OtpWasento\Test;

use PHPUnit\Framework\TestCase;
use WASENTO\OtpWasento\{OtpWasentoApi,
	OtpWasentoConfig
};

/** @package WASENTO\OtpWasento\Test */
class OtpWasentoTest extends TestCase
{
    /** @return void  */
    protected function setUp(): void
    {
		OtpWasentoConfig::$api = 'YOUR_API_KEY=';
    }

    /**
     * @group testCountries
     */
    public function testCountries()
    {
        $results = (new OtpWasentoApi)->countries();
        error_log(print_r($results, TRUE), 3, "./error.log");
        $this->assertIsObject($results);
    }

    /**
     * @group testRequestOtp
     */
    public function testRequestOtp()
    {
        $results = (new OtpWasentoApi)->requestOtp('081222212544','ID','{code} is your OTP');
        error_log(print_r($results, TRUE), 3, "./error.log");
        $this->assertIsObject($results);
    }

    /**
     * @group testVerifytOtp
     */
    public function testVerifytOtp()
    {
        $results = (new OtpWasentoApi)->verifyOtp('c442f0d92c0fec0d7a4414fc83323942','418639');
        error_log(print_r($results, TRUE), 3, "./error.log");
        $this->assertIsObject($results);
    }
}
