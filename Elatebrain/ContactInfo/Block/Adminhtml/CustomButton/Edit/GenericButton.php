<?php
namespace Elatebrain\ContactInfo\Block\Adminhtml\CustomButton\Edit;
    
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

class GenericButton
{
    protected $urlBuilder;

    protected $registry;

    public function __construct(
        Context $context,
        Registry $registry
    ) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId()
    {
        $user = $this->registry->registry('custombutton');
        return $user ? $user->getId() : null;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
