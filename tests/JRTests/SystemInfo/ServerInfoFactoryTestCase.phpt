<?php

namespace JRTests\SystemInfo;

use Tester\Assert;
use Tester\TestCase;
use JR\SystemInfo\PhpInfo;
use JR\SystemInfo\ServerInfoFactory;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Description of ServerInfoFactoryTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class ServerInfoFactoryTestCase extends TestCase
{
	/** @var array */
	private $serverData;
	
	/*
	 * @inheritdoc
	 */
	protected function setUp()
	{
		parent::setUp();
		
		$this->serverData = $_SERVER;
		
		$_SERVER['SERVER_NAME'] = 'RobinHood';
		$_SERVER['SERVER_ADDR'] = '203.101.18.33';
		$_SERVER['DOCUMENT_ROOT'] = '/var/home/www/test';
	}
	
	/*
	 * @inheritdoc
	 */
	protected function tearDown()
	{
		parent::tearDown();
		
		$_SERVER = $this->serverData;
	}
	
	/**
	 * @return void
	 */
	public function testCreateServerInfo()
	{
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::type('JR\SystemInfo\ServerInfo', $serverInfo);
	}
	
	/**
	 * @return void
	 */
	public function testGetOs()
	{
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same(PHP_OS, $serverInfo->getOS());
	}
	
	/**
	 * @return void
	 */
	public function testGetName()
	{
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same('RobinHood', $serverInfo->getName());
	}
	
	/**
	 * @return void
	 */
	public function testGetIP()
	{
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same('203.101.18.33', $serverInfo->getIP());
	}
	
	/**
	 * @return void
	 */
	public function testGetDocumentRoot()
	{
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same('/var/home/www/test', $serverInfo->getDocumentRoot());
	}
	
	/**
	 * @return void
	 */
	public function testGetEnvironmentWithoutWhenServerSoftwareIsUnknown()
	{
		unset($_SERVER['SERVER_SOFTWARE']);
		
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same(PHP_OS . ' PHP/5.6', $serverInfo->getEnvironment());
	}
	
	/**
	 * @return void
	 */
	public function testGetEnvironmentWithoutWhenServerSoftwareIsKnownWithPhpKeyword()
	{
		$_SERVER['SERVER_SOFTWARE'] = 'nginx 2.0 PHP 5.6';
		
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same('nginx 2.0 PHP 5.6', $serverInfo->getEnvironment());
	}
	
	/**
	 * @return void
	 */
	public function testGetEnvironmentWithoutWhenServerSoftwareIsKnownWithoutPhpKeyword()
	{
		$_SERVER['SERVER_SOFTWARE'] = 'nginx 2.0';
		
		$serverInfo = $this->createServerInfoFactory()->createServerInfo();
		Assert::same('nginx 2.0, ' . PHP_OS . ' PHP/5.6', $serverInfo->getEnvironment());
	}
	
	/**
	 * @return ServerInfoFactory
	 */
	private function createServerInfoFactory()
	{
		return new ServerInfoFactory(
			new PhpInfo('5.6', 'PHP/5.6')
		);
	}
}

run(new ServerInfoFactoryTestCase());
