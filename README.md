# Magento product attribute repository save bug

### Magento version 2.1.7 CE and EE

Demonstrating that source model is reset in save method of repository for new attribute.

[Link to buggy code ](https://github.com/magento/magento2/blob/5973d671fae91b0cde83b43777fff34848880d82/app/code/Magento/Catalog/Model/Product/Attribute/Repository.php#L163)

### How to replicate

- Copy Example/Catalog module into app/code directory.
- Install module 
    
      ./bin/magento module:enable "Example_Catalog"
      ./bin/magento setup:upgrade
      ./bin/magento setup:di:compile
      
- Run command to create an example product attribute
    
      ./bin/magento example:catalog:create_attribute
      
- In magento admin panel you should see attribute `example_attribute_code` of input type `select` having just an empty option.

- Run the command again and you should see the attribute has options from source model.
