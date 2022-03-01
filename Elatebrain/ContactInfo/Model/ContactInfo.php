<?php
namespace Elatebrain\ContactInfo\Model;

use Magento\Framework\Model\AbstractModel;

class ContactInfo extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Elatebrain\ContactInfo\Model\ResourceModel\ContactInfo::class);
    }
    
}
