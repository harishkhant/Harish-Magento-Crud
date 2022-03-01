<?php
namespace Elatebrain\ContactInfo\Controller\Adminhtml\ContactInfo;
 
use Magento\Backend\App\Action;
 
class Delete extends Action
{
    private $_model;

    public function __construct(
    Action\Context $context,
    \Elatebrain\ContactInfo\Model\ContactInfo $model
    ) {
        parent::__construct($context);
        $this->_model = $model;
      }  
 
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        // echo $id;
        // die();
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_model;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Successfully deleted'));
                return $resultRedirect->setPath('crudinfo/contactinfo/index');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('crudinfo/contactinfo/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Data does not exist'));
        return $resultRedirect->setPath('crudinfo/contactinfo/index');
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Elatebrain_ContactInfo::contactInfo_delete');
    }
}