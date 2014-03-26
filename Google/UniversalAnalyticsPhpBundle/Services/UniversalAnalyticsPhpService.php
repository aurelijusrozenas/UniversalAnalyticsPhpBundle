<?php


namespace Google\UniversalAnalyticsPhpBundle\Services;

use Google\UniversalAnalyticsPhpBundle\Tracker;

class UniversalAnalyticsPhpService
{

	protected $GAId;
	protected $debug = false;

	/**
	 * @param string $googleAnalyticsId
	 */
	public function __construct($googleAnalyticsId)
	{
		// load from bundle root folder
		// TODO maybe possible to load via PhpFileLoader class as is should be 'better'
		require_once __DIR__.'/../../..'.'/universal-analytics.php';

		$this->GAId = $googleAnalyticsId;
	}

	public function createTracker($clientId = null, $userId = null, $debug = null)
	{
		$tracker = new Tracker(
			/* web property id */
			$this->GAId,
			/* client id */
			$clientId,
			/* user id */
			$userId,
			/* debug */
			$debug !== null ? $debug : $this->debug
		);

		return $tracker;
	}

}
