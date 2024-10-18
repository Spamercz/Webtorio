<?php

declare(strict_types = 1);

namespace Webtorio\UI\Presenter;

/**
 * @method \Nette\Bridges\ApplicationLatte\DefaultTemplate getTemplate()
 */
class EngineerPresenter extends \Nette\Application\UI\Presenter
{

	public function __construct(
		private readonly \Spameri\Elastic\ClientProvider $clientProvider,
	)
	{
	}


	public function renderDefault()
	{
		$this->clientProvider->client()->search([
			'index' => 'engineer',
			'body' => [
				'query' => [
					'bool' => [
						'must' => [
							[
								'query' => [
									'bool' => [
										'should' => [
											[
												'multimatch' => [
													'query' => 'Spamer',
													'fields' => [
														'name^3',
														'description',
													],
													'type' => 'best_fields',
												],
											],
											[
												'term' => [
													'nickname' => 'Spamer',
												],
											],
											'minimum_should_match' => 1,
										],
									],
								]
							],
						],
					],
				],
			],
		]);
	}

}
