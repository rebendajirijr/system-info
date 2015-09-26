<?php

namespace JRTests\SystemInfo;

use Tester\Assert;
use Tester\TestCase;
use JR\SystemInfo\PhpInfo;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Description of PhpInfoTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class PhpInfoTestCase extends TestCase
{
	/** @var PhpInfo */
	private $phpInfo;
	
	/*
	 * @inheritdoc
	 */
	protected function setUp()
	{
		parent::setUp();
		
		$this->phpInfo = new PhpInfo('5.64', 'PHP/5.64');
	}
	
	/**
	 * @return void
	 */
	public function testGetVersion()
	{
		Assert::same('5.64', $this->phpInfo->getVersion());
	}
	
	/**
	 * @return void
	 */
	public function testGetVersionString()
	{
		Assert::same('PHP/5.64', $this->phpInfo->getVersionString());
	}
}

run(new PhpInfoTestCase());
