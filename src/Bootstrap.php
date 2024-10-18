<?php declare(strict_types=1);

namespace Webtorio;

class Bootstrap
{
    public static function boot(): \Nette\Bootstrap\Configurator
    {
        $configurator = new \Nette\Bootstrap\Configurator;
        $appDir = \dirname(__DIR__);

        $configurator->setDebugMode(true); // cli
        $configurator->enableTracy($appDir . '/log');

        $configurator->setTimeZone('Europe/Prague');
        $configurator->setTempDirectory($appDir . '/temp');

        $configurator->createRobotLoader()
            ->addDirectory(__DIR__)
            ->register();

        $configurator->addConfig($appDir . '/src/config/common.neon');
		if (\file_exists($appDir . '/src/config/services.neon')) {
			$configurator->addConfig($appDir . '/src/config/local.neon');
		}

        return $configurator;
    }
}
