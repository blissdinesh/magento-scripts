	
	Catalog Search: If only one result, show product view page insted of list view
	
-----------------------------------------------------------------------------------------

app/etc/modules/StackExchange_CatalogSearch.xml - the declaration file

<?xml version="1.0"?>
<config>
    <modules>
        <StackExchange_CatalogSearch>
            <codePool>local</codePool>
            <active>true</active>
            <depends>
                <Mage_CatalogSearch />
            </depends>
        </StackExchange_CatalogSearch>
    </modules>
</config>

-----------------------------------------------------------------------------------------

app/code/local/StackExchange/CatalogSearch/etc/config.xml - the configuration file:

<?xml version="1.0"?>
<config>
    <modules>
        <StackExchange_CatalogSearch>
            <version>1.0.0</version>
        </StackExchange_CatalogSearch>
    </modules>
    <global>
        <models>
            <stackexchange_catalogsearch>
                <class>StackExchange_CatalogSearch_Model</class>
            </stackexchange_catalogsearch>
        </models>
    </global>
    <frontend>
        <events>
            <controller_action_layout_render_before_catalogsearch_result_index><!-- for the quick search-->
                <observers>
                    <stackexchange_catalogsearch>
                        <model>stackexchange_catalogsearch/observer</model>
                        <method>redirectToProduct</method>
                    </stackexchange_catalogsearch>
                </observers>
            </controller_action_layout_render_before_catalogsearch_result_index>
            <controller_action_layout_render_before_catalogsearch_advanced_result><!-- for the advanced search-->
                <observers>
                    <stackexchange_catalogsearch>
                        <model>stackexchange_catalogsearch/observer</model>
                        <method>redirectToProduct</method>
                    </stackexchange_catalogsearch>
                </observers>
            </controller_action_layout_render_before_catalogsearch_advanced_result>
        </events>
    </frontend>
</config>

-----------------------------------------------------------------------------------------

app/code/local/StackExchange/CatalogSearch/Model/Observer.php - the observer that does all the work.

<?php
class StackExchange_CatalogSearch_Model_Observer
{
    //the product list block name in layout
    const RESULT_BLOCK_NAME = 'search_result_list';
    public function redirectToProduct($observer)
    {
        /** @var Mage_Catalog_Block_Product_List $block */
        $block = Mage::app()->getLayout()->getBlock(self::RESULT_BLOCK_NAME);
        if ($block) {
            $collection = $block->getLoadedProductCollection();
            if ($collection && $collection->getSize() == 1) {
                /** @var Mage_Catalog_Model_Product $product */
                $product = $collection->getFirstItem();
                $url = $product->getProductUrl();
                if ($url){
                    Mage::app()->getResponse()->setRedirect($url);
                    Mage::app()->getResponse()->sendResponse();
                    exit; //stop everything else
                }
            }
        }
    }
}
?>
------------------------------------------------------------------------------------------

Clear the cache, disable compilation if enabled and give it a go.

Note: This extension redirects to the product page when the search (and advanced search) page should return only on product, 
even if this happens after the search or after applying a layered navigation filter.


-----------------------------------------------------------------------------------------