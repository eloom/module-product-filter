<?php

namespace Eloom\ProductFilter\Block\Product;
/**
 * Catalog Products List Ajax block
 * Class ProductsList
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class LoadByIds extends \Magento\Framework\View\Element\Template {
	const PAGE_VAR_NAME = 'np';

	protected $cacheKeyInfo;

	protected $objectManager;

	public function __construct(
		\Magento\Catalog\Block\Product\Context $context,
		array                                  $data = []
	) {
		parent::__construct(
			$context,
			$data
		);
		$this->objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$this->addData([
			'cache_lifetime' => false
		]);
	}

	protected function _toHtml() {
		$data = $this->getRequest()->getParams();
		$data['cache_lifetime'] = false;
		$data['order_by'] = false;
		return $this->getLayout()->createBlock(\Eloom\ProductFilter\Block\Product\ProductsList::class)
			->setData($data)->toHtml();
	}
}
