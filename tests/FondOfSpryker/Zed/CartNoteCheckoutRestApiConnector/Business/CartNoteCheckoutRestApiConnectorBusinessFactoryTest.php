<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorBusinessFactory;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapperInterface;

class CartNoteCheckoutRestApiConnectorBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorBusinessFactory
     */
    protected $cartNoteCheckoutRestApiConnectorBusinessFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->cartNoteCheckoutRestApiConnectorBusinessFactory = new CartNoteCheckoutRestApiConnectorBusinessFactory();
    }

    /**
     * @return void
     */
    public function testCreateCartNoteQuoteMapper(): void
    {
        $this->assertInstanceOf(
            CartNoteQuoteMapperInterface::class,
            $this->cartNoteCheckoutRestApiConnectorBusinessFactory->createCartNoteQuoteMapper()
        );
    }
}