<?php
namespace Elatebrain\ContactInfo\Block\Adminhtml\CustomButton\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveEditButton extends GenericButton implements ButtonProviderInterface {
	public function getButtonData() {
		return [
			'label' => __('Save Edit'),
			'class' => 'save primary',
			'data_attribute' => [
				'mage-init' => ['button' => ['event' => 'save']],
				'form-role' => 'save',
			],
			'on_click' => sprintf("location.href= '%s';", $this->getSaveUrl()),
			'sort_order' => 90,
		];
	}

	public function getSaveUrl() {
		return $this->getUrl('*/*/saveedit', []);
	}
}
