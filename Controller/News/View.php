<?php

namespace Inchoo\Sample04\Controller\News;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class View extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $newsRegistry;

    public function __construct(Context $context, PageFactory $resultPageFactory, Registry $newsRegistry)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->newsRegistry = $newsRegistry;
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $this->newsRegistry->register('inchoo_news_id', $id);

        return $this->resultPageFactory->create();
    }
}
