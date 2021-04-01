<?php
namespace AHT\Testimonials\Model\ResourceModel\Category;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'aht_testimonials_collection';
	protected $_eventObject = 'Testimonials_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Testimonials\Model\Category', 'AHT\Testimonials\Model\ResourceModel\Category');
	}

}
