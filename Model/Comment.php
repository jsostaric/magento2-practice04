<?php


namespace Inchoo\Sample04\Model;


use Magento\Framework\Model\AbstractModel;

class Comment extends AbstractModel
{
    public function __construct()
    {
        $this->_init(\Inchoo\Sample04\Model\ResourceModel\Comment::class);
    }
}
