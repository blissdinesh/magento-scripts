	What is helper in Magento?  
		
--------------------------------------------------------

Theoretically you should never use helpers.
Helpers are just collections of unrelated methods and are always instantiated as a singletons.
This is basically procedural programming with functions grouped under some namespace (the class name in this case). 
But since Magento has helpers in the core you can put your methods in there that you have no idea where to put them or 
if you need to call them in a lot of different places (models, controllers, templates)

Use them as a last resort.

Also Magento requires a helper for each module for translation reasons.
You can just create a helper called Data.php in each module and leave it empty.