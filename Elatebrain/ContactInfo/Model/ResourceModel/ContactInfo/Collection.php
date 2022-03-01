<?php
namespace Elatebrain\ContactInfo\Model\ResourceModel\ContactInfo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Elatebrain\ContactInfo\Model\ContactInfo', 'Elatebrain\ContactInfo\Model\ResourceModel\ContactInfo');
    }
}