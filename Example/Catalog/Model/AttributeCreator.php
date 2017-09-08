<?php

namespace Example\Catalog\Model;

use Magento\Catalog\Api\Data\ProductAttributeInterface;
use Magento\Catalog\Api\ProductAttributeRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Eav\AttributeFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class AttributeCreator
{
    private $attributeFactory;
    private $attributeRepository;

    public function __construct(
        AttributeFactory $attributeFactory,
        ProductAttributeRepositoryInterface $attributeRepository
    ) {
        $this->attributeFactory = $attributeFactory;
        $this->attributeRepository = $attributeRepository;
    }

    public function create()
    {
        try {
            $attribute = $this->attributeRepository->get('example_attribute_code');
        } catch (NoSuchEntityException $e) {
            /** @var ProductAttributeInterface $attribute */
            $attribute = $this->attributeFactory->create();
        }

        $attributeData = [
            'attribute_code' => 'example_attribute_code',
            'frontend_input' => 'select',
            'frontend_label' => 'Example Attribute',
        ];
        $attribute->addData($attributeData);
        $attribute->setSourceModel(Source::class);
        $this->attributeRepository->save($attribute);
    }
}