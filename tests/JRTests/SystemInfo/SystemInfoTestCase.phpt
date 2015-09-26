<?php

namespace JRTests\SystemInfo;

use Nette\Http\Request;
use Nette\Http\UrlScript;
use Tester\Assert;
use Tester\TestCase;
use JR\SystemInfo\HostInfo;
use JR\SystemInfo\PhpInfo;
use JR\SystemInfo\ServerInfo;
use JR\SystemInfo\SystemInfo;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Description of SystemInfoTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class SystemInfoTestCase extends TestCase
{
	/** @var SystemInfo */
	private $systemInfo;
	
	/** @var ServerInfo */
	private $serverInfo;
	
	/** @var HostInfo */
	private $hostInfo;
	
	/** @var PhpInfo */
	private $phpInfo;
	
	/*
	 * @inheritdoc
	 */
	protected function setUp()
	{
		parent::setUp();
		
		$request = new Request(new UrlScript());
		
		$this->systemInfo = new SystemInfo(
			$this->serverInfo = new ServerInfo('Linux'),
			$this->hostInfo = new HostInfo($request),
			$this->phpInfo = new PhpInfo('5.4', 'PHP/5.4')
		);
	}
	
	/**
	 * @return void
	 */
	public function testGetServerInfo()
	{
		Assert::same($this->serverInfo, $this->systemInfo->getServerInfo());
	}
	
	/**
	 * @return void
	 */
	public function testGetHostInfo()
	{
		Assert::same($this->hostInfo, $this->systemInfo->getHostInfo());
	}
	
	/**
	 * @return void
	 */
	public function testGetPhpInfo()
	{
		Assert::same($this->phpInfo, $this->systemInfo->getPhpInfo());
	}
}

run(new SystemInfoTestCase());
