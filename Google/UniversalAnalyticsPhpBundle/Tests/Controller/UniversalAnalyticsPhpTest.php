<?php

namespace Google\UniversalAnalyticsPhpBundle\Tests;


use Google\UniversalAnalyticsPhpBundle\Tracker;
use Google\UniversalAnalyticsPhpBundle\Services\UniversalAnalyticsPhpService;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UniversalAnalyticsPhpTest extends WebTestCase
{

	private $container = null;

	/**
	 * {@inheritDoc}
	 */
	public function setUp()
	{
		if (!$this->container) {
			static::$kernel = static::createKernel();
			static::$kernel->boot();
			$this->container = static::$kernel->getContainer();
		}
	}

	public function testSendAnalytics()
	{
		/** @var UniversalAnalyticsPhpService $service */
		$service = $this->container->get('universal_analytics_php.services.universalAnalyticsPhp');
		/** @var Tracker $tracker */
		$tracker = $service->createTracker();

		$tracker->set('dimension1', 'pizza');

		$tracker->send(/* hit type */ 'event', /* hit properties */ array(
			'eventCategory' => 'test events',
			'eventAction' => 'testing',
			'eventLabel' => '(test)'
		));
	}

}
