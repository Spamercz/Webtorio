<?php declare(strict_types = 1);

namespace Webtorio\Model\Engineer;

class Entity extends \Spameri\Elastic\Entity\AbstractElasticEntity
{

	public function __construct(
		#[\Spameri\Elastic\Mapping\Entity(class: \Spameri\Elastic\Entity\Property\ElasticId::class)]
		public \Spameri\Elastic\Entity\Property\ElasticIdInterface $id,
		public string $name,
		public int $health,
		public int $speed,

		#[\Spameri\Elastic\Mapping\Collection]
		public \Spameri\Elastic\Entity\Collection\STIEntityCollection $inventory,

		#[\Spameri\Elastic\Mapping\STIEntity]
		public ArmorInterface $armor,

		#[\Spameri\Elastic\Mapping\STIEntity]
		public \Webtorio\Model\Planet\PlanetInterface $planet,

		#[\Spameri\Elastic\Mapping\Ignored]
		public VelocityCalulator $velocityCalculator = new VelocityCalulator(),
	)
	{
		parent::__construct($id);
	}

	public function entityVariables(): array
	{
		$entityVariables = parent::entityVariables();
		unset($entityVariables['velocityCalculator']);

		return $entityVariables;
	}

}
