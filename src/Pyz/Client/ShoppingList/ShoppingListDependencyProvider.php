<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ShoppingList;

use Spryker\Client\ShoppingList\ShoppingListDependencyProvider as SprykerShoppingListDependencyProvider;
use Spryker\Client\ShoppingListProductOption\Plugin\ShoppingListItemProductOptionRequestExpanderPlugin;
use Spryker\Client\ShoppingListProductOption\Plugin\ShoppingListItemProductOptionToItemProductOptionMapperPlugin;

class ShoppingListDependencyProvider extends SprykerShoppingListDependencyProvider
{
    /**
     * @return \Spryker\Client\ShoppingListExtension\Dependency\Plugin\ShoppingListItemRequestExpanderPluginInterface[]
     */
    protected function getShoppingListItemRequestExpanderPlugins(): array
    {
        return [
            new ShoppingListItemProductOptionRequestExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Client\ShoppingListExtension\Dependency\Plugin\ShoppingListItemToItemMapperPluginInterface[]
     */
    protected function getShoppingListItemToItemMapperPlugins(): array
    {
        return [
            new ShoppingListItemProductOptionToItemProductOptionMapperPlugin(),
        ];
    }
}
