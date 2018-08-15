<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ProductLinksSampleDataVenia\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\ProductLinksSampleDataVenia\Setup\ProductLink;

/**
* Patch is mechanism, that allows to do atomic upgrade data changes
*/
class InstallProductLinksSampleData implements
    DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /** @var ProductLink  */
    protected $productLink;

    /**
     * InstallProductLinksSampleData constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param ProductLink $productLink
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup, ProductLink $productLink)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->productLink = $productLink;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        print 'howdy';
        $this->productLink->install(
            ['Magento_ProductLinksSampleDataVenia::fixtures/Catalog/related.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Catalog/upsell.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Catalog/crossell.csv']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [

        ];
    }
}
