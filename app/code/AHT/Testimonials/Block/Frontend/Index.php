<?php
namespace AHT\Testimonials\Block\Frontend;

use Magento\Framework\View\Element\Template;

class Index extends Template {

    protected $testimonialsColectionFactory;

    // protected $customerFactory;

    // protected $customerRepositoryFactory;

    protected $testimonialsFactory;

    // protected $customerResourceFactory;

	public function __construct(
        Template\Context $context,
        array $data = [],
        \AHT\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory $testimonialsColectionFactory,
        \AHT\Testimonials\Model\TestimonialsFactory $testimonialsFactory
        // \AHT\Testimonials\Model\CustomerFactory $customerFactory,
        // \AHT\Testimonials\Model\ResourceModel\CustomerFactory $customerResourceFactory,
        // \AHT\Testimonials\Api\CustomerRepositoryInterface $customerRepositoryFactory,

        )
        {
        $this->testimonialsColectionFactory = $testimonialsColectionFactory;
        $this->testimonialsFactory = $testimonialsFactory;
		parent::__construct($context, $data);
    }

    /**
     * Preparing global layout
     *
     * @return $this
     */
    protected function _prepareLayout() {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('testimonials Collection'));
        return $this;
    }

     /**
     * Get all record from collection
     *
     * @return $collection
     */

    public function getAll() {
        $collecion = $this->testimonialsColectionFactory->create();
        return $collecion;
    }

    // /**
    //  * Get name customer
    //  *
    //  * @return $customer['customer_name']
    //  */
    // public function getNameCustomer($id) {
    //     $customer = $this->customerFactory->create();
    //     $customerResource = $this->customerResourceFactory->create();
    //     $customerResource->load($customer,$id);
    //     return $customer['customer_name'];
    // }

    /**
     * Get by id
     *
     * @return $collection
     */

    public function getById($id) {
        $id = $this->getRequest()->getParams();
        $collection = $this->testimonialsColectionFactory->create();
        $collection->addFieldToFilter('id', $id);
        return $collection;
    }

    /**
     * Get url create
     *
     * @return $url
     */
    public function getCreate() {
        return $this->getUrl('testimonials/index/create');
    }
    /**
     * Get url create
     *
     * @return $url
     */
    public function getSave() {
        return $this->getUrl('testimonials/index/save');
    }
}
