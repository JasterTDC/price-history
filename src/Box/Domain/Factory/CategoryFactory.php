<?php

namespace JasterTDC\PriceHistory\Box\Domain\Factory;

use Category;
use JasterTDC\PriceHistory\Shared\Domain\CategoryId;
use JasterTDC\PriceHistory\Shared\Domain\Name;

final class CategoryFactory
{
    public static function build(
        int $primitiveId,
        string $primitiveName,
        string $primitiveFriendlyName,
        ?int $primitiveParentId = null,
        ?string $primitiveParentName = null,
        ?string $primitiveParentFriendlyName = null
    ): Category {
        $id = new CategoryId($primitiveId);
        $name = new Name($primitiveName);
        $friendlyName = new Name($primitiveFriendlyName);

        $parentCategory = null;
        $parentId = null;
        $parentName = null;
        $parentFriendlyName = null;

        if (!empty($primitiveParentId)) {
            $parentId = new CategoryId($primitiveParentId);
        }

        if (!empty($primitiveName)) {
            $parentName = new Name($primitiveParentName);
        }

        if (!empty($primitiveFriendlyName)) {
            $parentFriendlyName = new Name($primitiveParentFriendlyName);
        }

        if (
            !empty($parentId) &&
            !empty($parentName) &&
            !empty($parentFriendlyName)
        ) {
            $parentCategory = new Category(
                id: $parentId,
                name: $parentName,
                friendlyName: $parentFriendlyName
            );
        }

        return new Category(
            id: $id,
            name: $name,
            friendlyName: $friendlyName,
            parentCategory: $parentCategory
        );
    }
}
