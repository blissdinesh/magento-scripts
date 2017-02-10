
=========  Why c is lowercase in controllers of Magento? ===============


1)	The classes located in the controllers folders are a special breed of classes.

2)	You cannot rewrite them in the same way as you rewrite a model or a block using the <rewrite> tag in config.xml, 
	you cannot instantiate them using a factory like you do for models (Mage::getModel()) or 
	with helpers (Mage::helper) or with blocks (Mage::app()->getLayout()->createBlock()).

3)	In some modules there is a folder called Controller (with capital C) and the classes in follow the standard class naming. 
	Those classes are not really controllers. They are used as parent classes for other controllers in the module or as routers.