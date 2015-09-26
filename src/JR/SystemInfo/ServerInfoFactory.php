<?php

namespace JR\SystemInfo;

use Nette\Object;

/**
 * Default server info factory which uses $_SERVER data internally.
 * 
 * @see http://php.net/manual/en/reserved.variables.server.php
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class ServerInfoFactory extends Object
{
	/** @var PhpInfo */
	private $phpInfo;
	
	public function __construct(PhpInfo $phpInfo)
	{
		$this->phpInfo = $phpInfo;
	}
	
	/**
	 * @return ServerInfo
	 */
	public function createServerInfo()
	{
		return new ServerInfo(
			$this->detectOS(),
			$this->detectName(),
			$this->detectIP(),
			$this->detectDocumentRoot(),
			$this->detectEnvironment()
		);
	}
	
	/**
	 * @return string
	 */
	protected function detectOS()
	{
		return PHP_OS;
	}
	
	/**
	 * Returns the name of the server host under which the current script is executing.
	 * If the script is running on a virtual host, this will be the value defined for that virtual host.
	 * 
	 * @return string|NULL
	 */
	public function detectName()
	{
		return $this->getServerDataItem('SERVER_NAME');
	}
	
	/**
	 * Returns the IP address of the server under which the current script is executing.
	 * 
	 * @return string|NULL
	 */
	protected function detectIP()
	{
		return $this->getServerDataItem('SERVER_ADDR');
	}
	
	/**
	 * @return string|NULL
	 */
	protected function detectDocumentRoot()
	{
		return $this->getServerDataItem('DOCUMENT_ROOT');
	}
	
	/**
	 * @return string
	 */
	protected function detectEnvironment()
	{
		$phpVersionString = $this->detectOS() . ' ' . $this->phpInfo->getVersionString();
		if (($serverSoftware = $this->getServerDataItem('SERVER_SOFTWARE')) !== NULL) {
			return $serverSoftware . (stripos($serverSoftware, 'php') === FALSE ? (', ' . $phpVersionString) : NULL);
		}
		return $phpVersionString;
	}
	
	/**
	 * @param string
	 * @param mixed|NULL
	 * @return string|NULL
	 */
	protected function getServerDataItem($key, $default = NULL)
	{
		if (array_key_exists($key, $_SERVER)) {
			return $_SERVER[$key];
		}
		return $default;
	}
}
