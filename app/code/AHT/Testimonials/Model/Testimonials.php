<?php
namespace AHT\Testimonials\Model;

use \Magento\Framework\DataObject\IdentityInterface;
use AHT\Testimonials\Api\Data\TestimonialsInterface;

// class Portfolio extends AbstractModel implements IdentityInterface
class Testimonials extends \Magento\Framework\Model\AbstractModel implements IdentityInterface, TestimonialsInterface {
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
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        $this->setData('id', $id);
    }

    public function getTitle()
    {
        return $this->getData('title');
    }
    public function setTitle($title)
    {
        $this->setData('title', $title);
    }

    public function getImages()
    {
        return $this->getData('images');
    }
    public function setImages($images)
    {
        $this->setData('images', $images);
    }

    public function getCategoryid()
    {
        return $this->getData('categoryid');
    }
    public function setCategoryid($categoryid)
    {
        $this->setData('categoryid', $categoryid);
    }

    public function getDescription()
    {
        return $this->getData('description');
    }
    public function setDescription($description)
    {
        $this->setData('description', $description);
    }

    public function getPrice()
    {
        return $this->getData('price');
    }
    public function setPrice($price)
    {
        $this->setData('price', $price);
    }

    public function getContent()
    {
        return $this->getData('content');
    }
    public function setContent($content)
    {
        $this->setData('content', $content);
    }
}
