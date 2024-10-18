<?php declare(strict_types = 1);

namespace Webtorio\Model\Engineer;

class IndexConfig extends \Spameri\Elastic\Settings\AbstractIndexConfig
{

	public function __construct(
		string $index = 'engineer',
		array $entityClass = [
		],
	)
	{
		parent::__construct($index, $entityClass);
	}


	public function provide(): \Spameri\ElasticQuery\Mapping\Settings
	{
		$settings = new \Spameri\ElasticQuery\Mapping\Settings(
			indexName: $this->index,
		);

		return $settings;
	}

}
