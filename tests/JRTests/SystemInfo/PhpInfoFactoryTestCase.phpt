<?php

namespace JRTests\SystemInfo;

use Tester\Assert;
use Tester\TestCase;
use JR\SystemInfo\PhpInfoFactory;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Description of PhpInfoFactoryTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class PhpInfoFactoryTestCase extends TestCase
{
	/**
	 * @return void
	 */
	public function testCreatePhpInfo()
	{
		$phpInfo = $this->createPhpInfoFactory()->createPhpInfo();
		Assert::type('JR\SystemInfo\PhpInfo', $phpInfo);
	}
	
	/**
	 * @return void
	 */
	public function testGetVersion()
	{
		$phpInfo = $this->createPhpInfoFactory()->createPhpInfo();
		Assert::same(PHP_VERSION, $phpInfo->getVersion());
	}
	
	/**
	 * @return void
	 */
	public function testGetVersionString()
	{
		$phpInfo = $this->createPhpInfoFactory()->createPhpInfo();
		Assert::same('PHP/' . PHP_VERSION, $phpInfo->getVersionString());
	}
	
	/**
	 * @return PhpInfoFactory
	 */
	private function createPhpInfoFactory()
	{
		return new PhpInfoFactory();
	}
}

run(new PhpInfoFactoryTestCase());
