<?php

namespace JR\SystemInfo;

use Nette\Object;

/**
 * Provides common system information.
 * 
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class SystemInfo extends Object
{
	/** @var ServerInfo */
	private $serverInfo;
	
	/** @var HostInfo */
	private $hostInfo;
	
	/** @var PhpInfo */
	private $phpInfo;
	
	public function __construct(
		ServerInfo $serverInfo,
		HostInfo $hostInfo,
		PhpInfo $phpInfo
	)
	{
		$this->serverInfo = $serverInfo;
		$this->hostInfo = $hostInfo;
		$this->phpInfo = $phpInfo;
	}
	
	/**
	 * @return ServerInfo
	 */
	public function getServerInfo()
	{
		return $this->serverInfo;
	}
	
	/**
	 * @return HostInfo
	 */
	public function getHostInfo()
	{
		return $this->hostInfo;
	}
	
	/**
	 * @return PhpInfo
	 */
	public function getPhpInfo()
	{
		return $this->phpInfo;
	}
}
