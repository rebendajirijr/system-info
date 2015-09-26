# Quickstart

This extension provides simple access to common system-related information for use in your Nette-powered applications.

## Installation

1. Install the package using [Composer](http://getcomposer.org/):

   ```sh
   $ composer require jr/system-info
   ```

2. Register the extension via standard [neon config](https://github.com/nette/neon):

   ```yml
   extensions:
		systemInfo: JR\SystemInfo\DI\SystemInfoExtension
   ```

## Usage

Now you can access system info via `JR\SystemInfo\SystemInfo`:

```php
<?php

use JR\SystemInfo\SystemInfo;
use Nette\Application\UI\Control;

class MyControl extends Control
{
	/** @var SystemInfo */
	private $systemInfo;

	public function __construct(SystemInfo $systemInfo)
	{
		$this->systemInfo = $systemInfo;
	}
}
```

For complete list of information you can get using this class, see [API](https://github.com/rebendajirijr/system-info/blob/master/src/JR/SystemInfo/SystemInfo.php).
