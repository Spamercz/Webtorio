<?php declare(strict_types = 1);

namespace Webtorio\Model\Planet;

class IndexConfig extends \Spameri\Elastic\Settings\AbstractIndexConfig
{

	public function __construct(
		string $index = 'planet',
		array $entityClass = [
			\Webtorio\Model\Planet\Vulcanus::class,
			\Webtorio\Model\Planet\Nauvius::class,
			\Webtorio\Model\Planet\Gleba::class,
		],
	)
	{
		parent::__construct($index, $entityClass);
	}


	public function provide(): \Spameri\ElasticQuery\Mapping\Settings
	{
		$settings = new \Spameri\ElasticQuery\Mapping\Settings(
			indexName: $this->index,
			hasSti: TRUE,
		);

		return $settings;
	}

}
