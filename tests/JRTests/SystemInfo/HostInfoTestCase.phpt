<?php

namespace JRTests\SystemInfo;

use Nette\Http\Request;
use Nette\Http\UrlScript;
use Tester\Assert;
use Tester\TestCase;
use JR\SystemInfo\HostInfo;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Description of HostInfoTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class HostInfoTestCase extends TestCase
{
	/** @var Request */
	private $request;
	
	/** @var HostInfo */
	private $hostInfo;
	
	/*
	 * @inheritdoc
	 */
	protected function setUp()
	{
		parent::setUp();
		
		$this->hostInfo = new HostInfo(
			$this->request = new Request(new UrlScript('http://www.fake-domain.com/test'))
		);
	}
	
	/**
	 * @return void
	 */
	public function testGetUrl()
	{
		Assert::same((string) $this->request->getUrl(), (string) $this->hostInfo->getUrl());
	}
	
	/**
	 * @return void
	 */
	public function testGetRemoteHost()
	{
		Assert::same($this->request->getRemoteHost(), $this->hostInfo->getRemoteHost());
	}
	
	/**
	 * @return void
	 */
	public function testGetRemoteIp()
	{
		Assert::same($this->request->getRemoteAddress(), $this->hostInfo->getRemoteIP());
	}
}

run(new HostInfoTestCase());
