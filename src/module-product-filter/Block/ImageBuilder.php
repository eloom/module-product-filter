<?php

namespace Eloom\ProductFilter\Block;

use Magento\Catalog\Helper\ImageFactory as HelperFactory;

class ImageBuilder extends \Magento\Catalog\Block\Product\ImageBuilder {
	public function eloomcreate() {
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$productMetadata = $objectManager->get('Magento\Framework\App\ProductMetadataInterface');
		$version = $productMetadata->getVersion();

		$helper = $this->helperFactory->create()
			->init($this->product, $this->imageId, $this->attributes);//magic here

		$imagesize = $this->attributes;
		$ratio = -1;
		if ($imagesize['resize_width'] && $imagesize['resize_height']) {
			$ratio = $imagesize['resize_height'] / $imagesize['resize_width'];
			$helper->resize($imagesize['resize_width'], $imagesize['resize_height']);
		}

		$template = $helper->getFrame()
			? 'Magento_Catalog::product/image.phtml'
			: 'Magento_Catalog::product/image_with_borders.phtml';

		$data = [
			'data' => [
				'template' => $template,
				'image_url' => $helper->getUrl(),
				'width' => !empty($imagesize['resize_width']) ? $imagesize['resize_width'] : $helper->getWidth(),
				'height' => !empty($imagesize['resize_height']) ? $imagesize['resize_height'] : $helper->getHeight(),
				'label' => $helper->getLabel(),
				'ratio' => ($ratio != -1) ? $ratio : $this->getRatio($helper),
				//'custom_attributes' => $this->getCustomAttributes(),
				'resized_image_width' => !empty($imagesize['resize_width']) ? $imagesize['resize_width'] : $helper->getWidth(),
				'resized_image_height' => !empty($imagesize['resize_height']) ? $imagesize['resize_height'] : $helper->getHeight(),
			],
		];
		//print_r($data);
		if (version_compare($version, '2.2.0', '<=') || version_compare($version, '2.2.0-dev', '<=')) {
			return $this->imageFactory->create($data);
		} else {
			return $this->imageFactory->create($this->product, $this->imageId, $this->attributes);
		}
	}
}
