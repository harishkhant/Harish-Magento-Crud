<?php
namespace Elatebrain\ContactInfo\Model\DataSource;

use Elatebrain\ContactInfo\Model\ResourceModel\ContactInfo\CollectionFactory;
use Elatebrain\ContactInfo\Model\ContactInfo;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $contactCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $contactCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        
        foreach ($items as $rowdata) {
           
            $this->loadedData[$rowdata->getId()]['rowdata'] = $rowdata->getData();
            
        }
        return $this->loadedData;
    }
}