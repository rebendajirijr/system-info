<?php

namespace JR\SystemInfo;

use Nette\Object;

/**
 * Default PHP info factory which uses PHP constant(s) internally.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class PhpInfoFactory extends Object
{
	/**
	 * @return PhpInfo
	 */
	public function createPhpInfo()
	{
		return new PhpInfo(
			$this->detectPhpVersion(),
			$this->detectPhpVersionString()
		);
	}
	
	/**
	 * @return string
	 */
	protected function detectPhpVersion()
	{
		return PHP_VERSION;
	}
	
	/**
	 * @return string
	 */
	protected function detectPhpVersionString()
	{
		return 'PHP/' . PHP_VERSION;
	}
}
