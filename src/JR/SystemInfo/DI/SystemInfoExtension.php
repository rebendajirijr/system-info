<?php

namespace JR\SystemInfo\DI;

use Nette\DI\CompilerExtension;

/**
 * Description of SystemInfoExtension.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
class SystemInfoExtension extends CompilerExtension
{
	/** @var string */
	const DEFAULT_NAME = 'systemInfo';
	
	/*
	 * @inheritdoc
	 */
	public function loadConfiguration()
	{
		parent::loadConfiguration();
		
		$containerBuilder = $this->getContainerBuilder();
		
		$containerBuilder->addDefinition($this->prefix('serverInfoFactory'))
			->setClass('JR\SystemInfo\ServerInfoFactory');
		
		$containerBuilder->addDefinition($this->prefix('phpInfoFactory'))
			->setClass('JR\SystemInfo\PhpInfoFactory');
		
		$containerBuilder->addDefinition($this->prefix('serverInfo'))
			->setFactory('@' . $this->prefix('serverInfoFactory') . '::createServerInfo');
		
		$containerBuilder->addDefinition($this->prefix('hostInfo'))
			->setClass('JR\SystemInfo\HostInfo');
		
		$containerBuilder->addDefinition($this->prefix('phpInfo'))
			->setFactory('@' . $this->prefix('phpInfoFactory') . '::createPhpInfo');
		
		$containerBuilder->addDefinition($this->prefix('systemInfo'))
			->setClass('JR\SystemInfo\SystemInfo');
	}
}
