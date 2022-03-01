<?php
namespace Elatebrain\ContactInfo\Controller\Adminhtml\ContactInfo;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Contact information')));
        return $resultPage;       
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Elatebrain_ContactInfo::contactInfo_index');
    }
}