<?php

namespace JR\SystemInfo;

use Nette\Object;

/**
 * Provides common PHP information.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class PhpInfo extends Object
{
	/** @var string */
	private $version;
	
	/** @var string */
	private $versionString;
	
	public function __construct(
		$version,
		$versionString
	)
	{
		$this->version = $version;
		$this->versionString = $versionString;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getVersion()
	{
		return $this->version;
	}
	
	/**
	 * @return string
	 */
	public function getVersionString()
	{
		return $this->versionString;
	}
}
