<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\ProductLinksSampleDataVenia\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\ProductLinksSampleDataVenia\Setup\ProductLink;
use Magento\ProductLinksSampleDataVenia\Setup\SetSession;

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
    public function __construct( SetSession $setSession,ModuleDataSetupInterface $moduleDataSetup, ProductLink $productLink)
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
        $this->productLink->install(
            ['Magento_ProductLinksSampleDataVenia::fixtures/Simple/related.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Simple/upsell.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Simple/crosssell.csv']
        );
        $this->productLink->install(
            ['Magento_ProductLinksSampleDataVenia::fixtures/Configurable/related.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Configurable/upsell.csv'],
            ['Magento_ProductLinksSampleDataVenia::fixtures/Configurable/crosssell.csv']
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
