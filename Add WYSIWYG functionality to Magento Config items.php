
		How to add WYSIWYG functionality to Magento Config items 

---------------------------------------------------------------------------

First of all add this in any layout file, to load the editor in the config section:

<adminhtml_system_config_edit>
    <update handle="editor"/>
    <reference name="head">
        <action method="setCanLoadTinyMce"><load>1</load></action>
    </reference>
</adminhtml_system_config_edit>

----------------------------------------------------------------------------

Now create your own field renderer. It has to be a block inside your module:

<?php
class Namespace_Module_Block_Adminhtml_System_Config_Editor 
    extends Mage_Adminhtml_Block_System_Config_Form_Field 
    implements Varien_Data_Form_Element_Renderer_Interface {

    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element) {
        $element->setWysiwyg(true);
        $element->setConfig(Mage::getSingleton('cms/wysiwyg_config')->getConfig());
        return parent::_getElementHtml($element);
    }
}
?>
----------------------------------------------------------------------------

Now for the element inside the system.xml set the frontend_type 'editor' and the frontend_model your new block

<fieldname translate="label">
    <label>Field label </label>
    <frontend_type>editor</frontend_type>
    <frontend_model>module/adminhtml_system_config_editor</frontend_model>
    <sort_order>150</sort_order>
    <show_in_default>1</show_in_default>
    <show_in_website>1</show_in_website>
    <show_in_store>1</show_in_store>
</fieldname>
There are some issues when changing the config scope to a website or a store view. The textarea does not become 'disabled'. But if you can ignore this, you can use it without any problems.

-------------------------------------------------------------------------------


