
======= How to Copy Code/Core system.xml file into Code/local in magento ==========

app/etc/modules/Easylife_Catalog.xml - the declaration file

<?xml version="1.0"?>
<config>
    <modules>
        <Easylife_Catalog>
            <active>true</active>
            <codePool>local</codePool>
            <depends>
                <Mage_Catalog />
            </depends>
        </Easylife_Catalog>
    </modules>
</config>

-----------------------------------------------------------

app/code/local/Easylife/Catalog/etc/config.xml - the configuration file

<?xml version="1.0"?>
<config>
    <modules>
        <Easylife_Catalog>
            <version>0.0.1</version>
        </Easylife_Catalog>
    </modules>
</config>

-----------------------------------------------------------

app/etc/local/Easylife/Catalog/etc/system.xml - system->configuration file 

Let's say you want to change the List Mode field to be available only at global level (no website and store view level). 
The setting path is catalog/frontend/list_mode. Then the system.xml will look like this:

<?xml version="1.0"?>
<config>
    <sections>
        <catalog><!-- first part of the path -->
            <groups>
                <frontend><!-- second part of the path -->
                    <fields>
                        <list_mode><!-- third part of the path -->
                            <show_in_website>0</show_in_website><!-- this will override the core value -->
                            <show_in_store>0</show_in_store><!-- this will override the core value -->
                        </list_mode>
                    </fields>
                </frontend>
            </groups>
        </catalog>
    </sections>
</config>

-------------------------------------------------------------

Now let's say you want to add a new field called custom in the same config section. Now the xml above becomes

<?xml version="1.0"?>
<config>
    <sections>
        <catalog><!-- first part of the path -->
            <groups>
                <frontend><!-- second part of the path -->
                    <fields>
                        <list_mode><!-- third part of the path -->
                            <show_in_website>0</show_in_website><!-- this will override the core value -->
                            <show_in_store>0</show_in_store><!-- this will override the core value -->
                        </list_mode>
                        <custom translate="label"><!-- your new field -->
                            <label>Custom</label>
                            <frontend_type>text</frontend_type>
                            <sort_order>1000</sort_order>
                            <show_in_default>1</show_in_default>
                            <show_in_website>1</show_in_website>
                            <show_in_store>1</show_in_store>
                        </custom>
                    </fields>
                </frontend>
            </groups>
        </catalog>
    </sections>
</config>

----------------------------------------------------------------


