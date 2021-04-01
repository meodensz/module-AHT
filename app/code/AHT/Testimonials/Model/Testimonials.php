<?php
namespace AHT\Testimonials\Model;

// use \Magento\Framework\DataObject\IdentityInterface;
use AHT\Testimonials\Api\Data\TestimonialsInterface;

// class Portfolio extends AbstractModel implements IdentityInterface
class Testimonials extends \Magento\Framework\Model\AbstractModel implements TestimonialsInterface {
    const CACHE_TAG = 'aht_testimonials';

    protected $_cacheTag = 'aht_testimonials';

    protected $_eventPrefix = 'aht_testimonials';

    public function __construct(
   	 \Magento\Framework\Model\Context $context,
   	 \Magento\Framework\Registry $registry,
   	 \Magento\Framework\Model\ResourceModel\AbstractResource $resource =
   	 null,
   	 \Magento\Framework\Data\Collection\AbstractDb $resourceCollection =
   	 null,
   	 array $data = []
    ) {
   	 parent::__construct($context, $registry, $resource,$resourceCollection, $data);
    }
    public function _construct() {
		$this->_init('AHT\Testimonials\Model\ResourceModel\Testimonials');
    }
}
