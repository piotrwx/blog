<?php


namespace M2S\Blog\Api;


interface ItemRepositoryInterface
{
    /**
     * @return \M2S\Blog\Api\Data\ItemInterface[]
     */
    public function getList();
}
