# Magento product attribute repository save bug

### Magento version 2.1.7 CE and EE

Demostrating that source model is reset in save method of repository for new atribute.

[Link to buggy code ](https://github.com/magento/magento2/blob/5973d671fae91b0cde83b43777fff34848880d82/app/code/Magento/Catalog/Model/Product/Attribute/Repository.php#L163)
