
how to create an new observer on the event catalog_product_save_before ....

---------------------------------------------------------------
app/etc/modules/Easylife_Meta.xml - the declaration file

<?xml version="1.0"?>
<config>
    <modules>
        <Easylife_Meta>
            <codePool>local</codePool>
            <active>true</active>
            <depends>
                <Mage_Catalog />
            </depends>
        </Easylife_Meta>
    </modules>
</config>

---------------------------------------------------------------

app/code/local/Easylife/Meta/etc/config.xml - the configuration file 

<?xml version="1.0"?>
<config>
    <modules>
        <Easylife_Meta>
            <version>0.0.1</version>
        </Easylife_Meta>
    </modules>
    <global>
        <models>
            <easylife_meta>
                <class>Easylife_Meta_Model</class>
            </easylife_meta>
        </models>
    </global>
    <adminhtml>
        <events>
            <catalog_product_save_before><!-- observe the event -->
                <observers>
                    <easylife_meta>
                        <class>easylife_meta/observer</class>
                        <method>autoMetaDescription</method>
                    </easylife_meta>
                </observers>
            </catalog_product_save_before>
        </events>
    </adminhtml>
</config>

-------------------------------------------------------------------------------

app/code/local/Easylife/Meta/Model/Observer.php - the observe class

<?php 
class Easylife_Meta_Model_Observer {
    public function autoMetaDescription($observer) {
        $product = $observer->getEvent()->getProduct();
        $metaDescription = "Buy ". $product->getName()." for Rs ".number_format($product->getFinalPrice(), 2)." at sitename.com | New Book | Authorised seller for ". $product->getAttributeText('publisher');
        $product->setMetaDescription($metaDescription);
    } 
}

?>
----------------------------------------------------------------------------------

