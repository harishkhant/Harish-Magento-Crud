<?php
namespace Elatebrain\ContactInfo\Controller\Adminhtml\ContactInfo;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Elatebrain\ContactInfo\Model\ContactInfoFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;

class Saveedit extends Action
{
  protected $_entityFactory;

  protected $resultPageFactory;

  protected $_sessionManager;

  public function __construct(
    Context $context,
    ContactInfoFactory $entityFactory,
    PageFactory $resultPageFactory,
    \Magento\Ui\Component\MassAction\Filter $filter,
    SessionManagerInterface $sessionManager
    ){
      parent::__construct($context);
      $this->_entityFactory = $entityFactory;
      $this->resultPageFactory = $resultPageFactory;
      $this->_sessionManager = $sessionManager;
      $this->filter = $filter;
    }

  public function execute() {
    $resultRedirect = $this->resultRedirectFactory->create();
    $entityModel = $this->_entityFactory->create();
    $data = $this->getRequest()->getPost();
    $products = $this->getRequest()->getPost('id');
    $myArray = json_decode(json_encode($data), true);
    
    $final_pid=$products.'&';
    
    $entityModel->setData('id',$myArray["rowdata"]["id"]);
    $entityModel->setData('name',$myArray["rowdata"]["name"]);
    $entityModel->setData('email',$myArray["rowdata"]["email"]);
    $entityModel->setData('phone_number',$myArray["rowdata"]["phone_number"]);
    $entityModel->setData('message',$myArray["rowdata"]["message"]);
    $modifiedDate = date("y-m-d h:i:s");
    $entityModel->setData('update_at',$modifiedDate);
    $entityModel->save();
    //check for `back` parameter
    $this->_redirect('*/*');
    $this->messageManager->addSuccess(__('Data has been Edited.'));
  }

  protected function _isAllowed()
  {
      return $this->_authorization->isAllowed('Elatebrain_ContactInfo::contactInfo_saveedit');
  }
}