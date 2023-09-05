<?php

declare(strict_types=1);

namespace WASENTO\OtpWasento;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/** @package WASENTO\OtpWasento */
class Requestor
{
	/**
	 * @param string $endpoint 
	 * @param string $verb 
	 * @param array $payload 
	 */
	public function fetchData(string $endpoint, string $verb, array $payload = null)
	{
		$container = [];

		$history = Middleware::history($container);

		$handlerStack = HandlerStack::create();

		$handlerStack->push($history);

		$client = new Client(['http_errors' => false, 'handler' => $handlerStack]);

		$res = $client->request($verb, $endpoint, $payload);

		$data = (string) $res->getBody();
		$data = json_decode($data);

		return $data;
	}
}
