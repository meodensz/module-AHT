<?php
namespace AHT\Testimonials\Controller\Adminhtml\Index;

use AHT\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory;
use AHT\Testimonials\Model\TestimonialsFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $filter;
    protected $collectionFactory;
    protected $_postFactory;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        TestimonialsFactory $_postFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->_postFactory = $_postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $CustomData = $this->collectionFactory->create();

        foreach ($CustomData as $value) {
            $templateId[] = $value['id'];
        }

        $parameterData = $this->getRequest()->getParams('id');

        $selectedAppsid = $this->getRequest()->getParams('id');

        if (array_key_exists("selected", $parameterData)) {
            $selectedAppsid = $parameterData['selected'];
        }

        if (array_key_exists("excluded", $parameterData)) {
            if ($parameterData['excluded'] == 'false') {
                $selectedAppsid = $templateId;
            } else {
                $selectedAppsid = array_diff($templateId, $parameterData['excluded']);
            }
        }

        if (!is_array($selectedAppsid)) {
            $this->messageManager->addError(__('Please select item(s).'));

        } else {
            try {
                foreach ($selectedAppsid as $id) {
                    $model = $this->_postFactory->create()
                    ->load($id)
                    ->delete();
                }
                $this->messageManager->addSuccess(__('Total of %1 record(s) were successfully deleted.', count($selectedAppsid)));

            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
