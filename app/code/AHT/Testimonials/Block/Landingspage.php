<?php
namespace AHT\Testimonials\Block;
use Magento\Framework\View\Element\Template;

class Landingspage extends Template {
	public function __construct(Template\Context $context, array $data = []) {
		parent::__construct($context, $data);
	}
	public function getLandingsUrl() {
		return __('OWL Carousel!');
	}
}
