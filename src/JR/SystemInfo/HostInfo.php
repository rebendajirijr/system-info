<?php

namespace JR\SystemInfo;

use Nette\Http\IRequest;
use Nette\Http\UrlScript;
use Nette\Object;

/**
 * Provides some info about a host.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class HostInfo extends Object
{
	/** @var IRequest */
	private $request;
	
	public function __construct(IRequest $request)
	{
		$this->request = $request;
	}
	
	/**
	 * @return UrlScript
	 */
	public function getUrl()
	{
		return $this->request->getUrl();
	}
	
	/**
	 * Returns the IP address of the remote client.
	 * 
	 * @return string|NULL
	 */
	public function getRemoteIP()
	{
		return $this->request->getRemoteAddress();
	}
	
	/**
	 * Returns the host of the remote client.
	 * 
	 * @retun string|NULL
	 */
	public function getRemoteHost()
	{
		return $this->request->getRemoteHost();
	}
}
