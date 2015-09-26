<?php

namespace JRTests\SystemInfo\DI;

use Tester\Assert;
use Tester\TestCase;
use Nette\Configurator;
use Nette\DI\Compiler;
use Nette\Utils\Strings;
use JR\SystemInfo\DI\SystemInfoExtension;
use JR\SystemInfo\SystemInfo;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * Description of SystemInfoExtensionTestCase.
 *
 * @author RebendaJiri <jiri.rebenda@htmldriven.com>
 */
final class SystemInfoExtensionTestCase extends TestCase
{
	/**
	 * @return Configurator
	 */
	private function createConfigurator()
	{
		$configurator = new Configurator();
		$configurator->setTempDirectory(TEMP_DIR);
		$configurator->addParameters([
			'container' => [
				'class' => 'SystemContainer_' . Strings::random(),
			],
		]);
		
		$configurator->onCompile[] = function (Configurator $configurator, Compiler $compiler) {
			$systemInfoExtension = new SystemInfoExtension();
			$compiler->addExtension(SystemInfoExtension::DEFAULT_NAME, $systemInfoExtension);
			
			$extensions = $compiler->getExtensions('Nette\Bridges\ApplicationDI\ApplicationExtension');
			$applicationExtension = array_shift($extensions);
			if ($applicationExtension !== NULL) {
				$applicationExtension->defaults['scanDirs'] = FALSE;
			}
		};
		return $configurator;
	}
	
	/**
	 * @return void
	 */
	public function testServicesExist()
	{
		$configurator = $this->createConfigurator();
		$container = $configurator->createContainer();
		
		$systemInfo = $container->getService(SystemInfoExtension::DEFAULT_NAME . '.systemInfo');
		Assert::type('JR\SystemInfo\SystemInfo', $systemInfo);
		
		$phpInfo = $container->getService(SystemInfoExtension::DEFAULT_NAME . '.phpInfo');
		Assert::type('JR\SystemInfo\PhpInfo', $phpInfo);
		
		$serverInfo = $container->getService(SystemInfoExtension::DEFAULT_NAME . '.serverInfo');
		Assert::type('JR\SystemInfo\ServerInfo', $serverInfo);
		
		$serverInfoFactory = $container->getService(SystemInfoExtension::DEFAULT_NAME . '.serverInfoFactory');
		Assert::type('JR\SystemInfo\ServerInfoFactory', $serverInfoFactory);
		
		$phpInfoFactory = $container->getService(SystemInfoExtension::DEFAULT_NAME . '.phpInfoFactory');
		Assert::type('JR\SystemInfo\PhpInfoFactory', $phpInfoFactory);
	}
}

run(new SystemInfoExtensionTestCase());
