<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\HelloWorld\Plugin\Provider;

use Silex\Application;
use SprykerShop\Yves\ShopApplication\Plugin\Provider\AbstractYvesControllerProvider;

class HelloWorldControllerProvider extends AbstractYvesControllerProvider
{
    const HELLOWORLD_INDEX = 'helloworld-index';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $this->createGetController('/hello-world', static::HELLOWORLD_INDEX, 'HelloWorld', 'Index', 'index');
    }
}