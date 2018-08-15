<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ProductLinksSampleData\Setup\Patch\Data;

use Magento\Framework\Setup;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\ProductLinksSampleDataVenia\Setup\ProductLink;

/**
 * Class InstallProductLinksSampleData
 * @package Magento\ProductLinksSampleData\Setup\Patch\Data
 */
class InstallProductLinksSampleData implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var Setup\SampleData\Executor
     */
    protected $executor;

    /**
     * @var \Magento\ProductLinksSampleData\Setup\Installer
     */
    protected $installer;

    /** @var ProductLink  */
    protected $productLink;

    /**
     * InstallProductLinksSampleData constructor.
     * @param Setup\SampleData\Executor $executor
     * @param ProductLink $productLink
     */
    public function __construct(
        Setup\SampleData\Executor $executor,
        ProductLink $productLink
    ) {
        $this->executor = $executor;
        $this->installer = $installer;
        $this->productLink = $productLink;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->productLink->install(
            ['Magento_ProductLinksSampleDataVenia::fixtures/Catalog/related.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Catalog/upsell.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Catalog/crossell.csv']
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }
}
