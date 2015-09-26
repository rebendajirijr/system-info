<?php

namespace JR\SystemInfo;

use Nette\Object;

/**
 * Provides common info about a serverthe PHP script is being executed on.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class ServerInfo extends Object
{
	/** @var string|NULL */
	private $os;
	
	/** @var string|NULL */
	private $name;
	
	/** @var string|NULL */
	private $ip;
	
	/** @var string|NULL */
	private $documentRoot;
	
	/** @var string|NULL */
	private $environment;
	
	public function __construct(
		$os = NULL,
		$name = NULL,
		$ip = NULL,
		$documentRoot = NULL,
		$environment = NULL
	)
	{
		$this->os = $os;
		$this->name = $name;
		$this->ip = $ip;
		$this->documentRoot = $documentRoot;
		$this->environment = $environment;
	}
	
	/**
	 * Returns name of OS the server is being run on.
	 * 
	 * @return string|NULL
	 */
	public function getOS()
	{
		return $this->os;
	}
	
	/**
	 * Returns the name of the server host under which the current script is executing.
	 * If the script is running on a virtual host, this will be the value defined for that virtual host.
	 * 
	 * @return string|NULL
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * Returns the IP address of the server under which the current script is executing.
	 * 
	 * @return string|NULL
	 */
	public function getIP()
	{
		return $this->ip;
	}
	
	/**
	 * @return string|NULL
	 */
	public function getDocumentRoot()
	{
		return $this->documentRoot;
	}
	
	/**
	 * Returns textual description of the running environment.
	 * 
	 * @return string|NULL
	 */
	public function getEnvironment()
	{
		return $this->environment;
	}
}
