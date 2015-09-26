<?php

namespace JRTests\SystemInfo;

use Tester\Assert;
use Tester\TestCase;
use JR\SystemInfo\ServerInfo;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Description of ServerInfoTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class ServerInfoTestCase extends TestCase
{
	/** @var ServerInfo */
	private $serverInfo;
	
	/*
	 * @inheritdoc
	 */
	protected function setUp()
	{
		parent::setUp();
		
		$this->serverInfo = new ServerInfo(
			'Linux A',
			'RobinHood',
			'203.123.18.36',
			'/var/home/www/test',
			'PHP Linux A'
		);
	}
	
	/**
	 * @return void
	 */
	public function testGetOs()
	{
		Assert::same('Linux A', $this->serverInfo->getOS());
	}
	
	/**
	 * @return void
	 */
	public function testGetName()
	{
		Assert::same('RobinHood', $this->serverInfo->getName());
	}
	
	/**
	 * @return void
	 */
	public function testGetIp()
	{
		Assert::same('203.123.18.36', $this->serverInfo->getIP());
	}
	
	/**
	 * @return void
	 */
	public function testGetDocumentRoot()
	{
		Assert::same('/var/home/www/test', $this->serverInfo->getDocumentRoot());
	}
	
	/**
	 * @return void
	 */
	public function testGetEnvironment()
	{
		Assert::same('PHP Linux A', $this->serverInfo->getEnvironment());
	}
}

run(new ServerInfoTestCase());
