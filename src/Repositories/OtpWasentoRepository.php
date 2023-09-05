<?php

declare(strict_types=1);

namespace WASENTO\OtpWasento\Repositories;

use WASENTO\OtpWasento\{OtpWasentoConfig, Requestor};
use WASENTO\OtpWasento\Exceptions\OtpWasentoException;

/** @package WASENTO\OtpWasento\Repositories */
class OtpWasentoRepository
{
	const ENDPOINT = 'https://api.wasento.com/api/auth';

	/**
	 * Get countries
	 */
	public function countries()
	{
		try {
			$url = self::ENDPOINT.'/countries';

			$payload = [
				'headers' => [
					'x-wasento' => OtpWasentoConfig::$api,
					'Content-Type' => 'application/json'
				]
			];

			$result = (new Requestor)->fetchData($url, 'GET', $payload);

			return $result;
		} catch (OtpWasentoException $e) {
			throw $e;
		}
	}

	/**
	 * Request OTP
	 *
	 * @param      string  $phone    The phone
	 * @param      string  $country  The country
	 * @param      string  $message  The message
	 */
	public function requestOtp($phone, $country, $message)
	{
		try {
			$url = self::ENDPOINT.'/client-request-otp';

			$payload = [
				'headers' => [
					'x-wasento' => OtpWasentoConfig::$api,
					'Content-Type' => 'application/json'
				],
				'json' => [
					'phone' => $phone,
					'country' => $country,
					'message' => $message,
				]
			];

			$result = (new Requestor)->fetchData($url, 'POST', $payload);

			return $result;
		} catch (OtpWasentoException $e) {
			throw $e;
		}
	}

	/**
	 * Verify OTP
	 *
	 * @param      string  $requestId  The request identifier
	 * @param      string  $code       The code
	 */
	public function verifyOtp($requestId, $code)
	{
		try {
			$url = self::ENDPOINT.'/client-verify-otp';

			$payload = [
				'headers' => [
					'x-wasento' => OtpWasentoConfig::$api,
					'Content-Type' => 'application/json'
				],
				'json' => [
					'requestId' => $requestId,
					'otp' => $code,
				]
			];

			$result = (new Requestor)->fetchData($url, 'POST', $payload);

			return $result;
		} catch (OtpWasentoException $e) {
			throw $e;
		}
	}
}
