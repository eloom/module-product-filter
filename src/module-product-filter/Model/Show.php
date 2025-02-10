<?php

namespace Eloom\ProductFilter\Model;


/**
 * Class Rule
 */
class Show implements \Magento\Framework\Option\ArrayInterface {
	/**
	 * Options getter
	 *
	 * @return array
	 */
	public function toOptionArray() {
		return [
			['value' => 'thumb', 'label' => __('Thumbnail')],
			['value' => 'name', 'label' => __('Name')],
			['value' => 'sku', 'label' => __('SKU')],
			['value' => 'description', 'label' => __('Description')],
			['value' => 'review', 'label' => __('Review')],
			['value' => 'price', 'label' => __('Price')],
			['value' => 'addtocart', 'label' => __('Add to cart')],
			['value' => 'wishlist', 'label' => __('Wishlist')],
			['value' => 'compare', 'label' => __('Compare')],
			['value' => 'quickshop', 'label' => __('Quick Shop')],
			['value' => 'label', 'label' => __('Label')]
		];
	}

	/**
	 * Get options in "key-value" format
	 *
	 * @return array
	 */
	public function toArray() {
		return [
			['value' => 'thumb', 'label' => __('Thumbnail')],
			['value' => 'name', 'label' => __('Name')],
			['value' => 'sku', 'label' => __('SKU')],
			['value' => 'description', 'label' => __('Description')],
			['value' => 'review', 'label' => __('Review')],
			['value' => 'price', 'label' => __('Price')],
			['value' => 'addtocart', 'label' => __('Add to cart')],
			['value' => 'wishlist', 'label' => __('Wishlist')],
			['value' => 'compare', 'label' => __('Compare')],
			['value' => 'quickshop', 'label' => __('Quick Shop')],
			['value' => 'label', 'label' => __('Label')]
		];
	}
}
