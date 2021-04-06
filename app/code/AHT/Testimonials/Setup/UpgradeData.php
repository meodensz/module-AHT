<?php

namespace AHT\Testimonials\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeData implements UpgradeDataInterface
{
	protected $_postFactory;

	public function __construct(\AHT\Testimonials\Model\TestimonialsFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}

	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '1.0.2', '<')) {
			$data = [
				'title' => "It is Test Upgrade Data",
				'images' => "test.jpg Upgrade Data",
                'description'      => "t is Test's description Upgrade Data",
                'titleUP' =>"YESNO"
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
        }
        if (version_compare($context->getVersion(), '1.0.5', '<')) {
			$data = [
				'name' => "Upgrade Data",
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
		$setup->startSetup();
	}
}
