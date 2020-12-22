<?php

namespace Inchoo\Sample04\ViewModel;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class NewsViewModel implements ArgumentInterface
{
    protected $newsRepository;
    protected $searchCriteriaBuilder;
    protected $sortOrder;

    public function __construct(
        \Inchoo\Sample04\Api\NewsRepositoryInterface $newsRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrder $sortOrder
    ) {
        $this->newsRepository = $newsRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrder = $sortOrder;
    }

    public function getAllNews()
    {
        $this->sortOrder->setField('news_id')->getDirection('desc');
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchCriteria->setSortOrders([$this->sortOrder])->setPageSize(10);

        $newsList = $this->newsRepository->getList($searchCriteria)->getItems();

        return $newsList;
    }

    public function getNewsById($id)
    {
        $news = '';
        try {
            $news = $this->newsRepository->getById($id);
        } catch (NoSuchEntityException $e) {
            $e->getMessage();
        }

        return $news;
    }
}
