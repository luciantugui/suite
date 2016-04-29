<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout;

use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Customer\Plugin\CustomerStepHandler;
use Pyz\Yves\Shipment\Plugin\ShipmentHandlerPlugin;
use Pyz\Yves\Shipment\Plugin\ShipmentSubFormPlugin;
use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class CheckoutDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_CART = 'cart client';
    const CLIENT_CALCULATION = 'calculation client';
    const CLIENT_CHECKOUT = 'checkout client';
    const CLIENT_CUSTOMER = 'customer client';
    const PLUGIN_APPLICATION = 'application plugin';

    const PLUGIN_SHIPMENT_SUB_FORM = 'shipment sub form plugin';
    const PLUGIN_CUSTOMER_STEP_HANDLER = 'step handler plugin';

    const PAYMENT_METHOD_HANDLER = 'payment method handler';
    const PAYMENT_SUB_FORMS = 'PAYMENT_SUB_FORMS';

    const PLUGIN_SHIPMENT_HANDLER = 'shipment handler plugin';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container = $this->provideClients($container);
        $container = $this->providePlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function provideClients(Container $container)
    {
        $container[self::CLIENT_CART] = function (Container $container) {
            return $container->getLocator()->cart()->client();
        };

        $container[self::CLIENT_CALCULATION] = function (Container $container) {
            return $container->getLocator()->calculation()->client();
        };

        $container[self::CLIENT_CHECKOUT] = function (Container $container) {
            return $container->getLocator()->checkout()->client();
        };

        $container[self::CLIENT_CUSTOMER] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };

        return $container;
    }

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    protected function providePlugins(Container $container)
    {
        $container[self::PAYMENT_SUB_FORMS] = function () {
            return [];
        };
        
        $container[self::PAYMENT_METHOD_HANDLER] = function () {
            return [];
        };

        $container[self::PLUGIN_SHIPMENT_SUB_FORM] = function () {
            return new ShipmentSubFormPlugin();
        };

        $container[self::PLUGIN_CUSTOMER_STEP_HANDLER] = function () {
            return new CustomerStepHandler();
        };

        $container[self::PLUGIN_SHIPMENT_HANDLER] = function () {
            return new ShipmentHandlerPlugin();
        };

        $container[self::PLUGIN_APPLICATION] = function () {
            $pimplePlugin = new Pimple();

            return $pimplePlugin->getApplication();
        };

        return $container;
    }

}
