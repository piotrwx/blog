<?php

namespace M2S\Blog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
                $setup->getTable('m2s_blog')
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Post ID'
            )->addColumn(
                'title',
                Table::TYPE_TEXT,
                null,
                ['nullable' => false],
                'Post title'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Post created time'
            )->addIndex(
                $setup->getIdxName('m2s_blog', ['title']),
                ['title']
            )->setComment('M2S Blog');

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
