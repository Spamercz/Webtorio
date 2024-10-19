<?php

declare(strict_types = 1);

namespace Webtorio\UI\Presenter;

/**
 * @method \Nette\Bridges\ApplicationLatte\DefaultTemplate getTemplate()
 */
class EngineerPresenter extends \Nette\Application\UI\Presenter
{

	public function __construct(
		private readonly \Spameri\Elastic\EntityManager $entityManager,
	)
	{
	}


	public function renderDefault()
	{
		$entity = new \Webtorio\Model\Engineer\Entity(
			id: new \Spameri\Elastic\Entity\Property\EmptyElasticId(),
			name: 'Spamer',
			health: 100,
			speed: 10,
			inventory: new \Spameri\Elastic\Entity\Collection\STIEntityCollection(
				... [
					new \Webtorio\Model\Inventory\Steel(),
					new \Webtorio\Model\Inventory\GreenCircuit(),
					new \Webtorio\Model\Inventory\RedCircuit(),
				]
			),
			armor: new \Webtorio\Model\Engineer\PowerArmor(),
			planet: new \Webtorio\Model\Planet\Gleba(new \Spameri\Elastic\Entity\Property\EmptyElasticId()),
		);

		$this->entityManager->persist($entity);


		$elasticQuery = new \Spameri\ElasticQuery\ElasticQuery();
		$elasticQuery->addMustQuery(
			new \Spameri\ElasticQuery\Query\ElasticMatch(
				field: 'name',
				query: 'Spamer',
			),
		);
		$found = $this->entityManager->findOneBy(
			elasticQuery: $elasticQuery,
			class: \Webtorio\Model\Engineer\Entity::class
		);

		$this->template->add('engineer', $found);
	}

}
