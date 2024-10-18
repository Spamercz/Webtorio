<?php declare(strict_types = 1);

namespace Webtorio\Model\Engineer;

class Entity extends \Spameri\Elastic\Entity\AbstractElasticEntity
{

	public function __construct(
		\Spameri\Elastic\Entity\Property\ElasticIdInterface $id,
		public string $name,
	)
	{
		parent::__construct($id);
	}

}
