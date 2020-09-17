<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business;

use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapper;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapperInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class CartNoteCheckoutRestApiConnectorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapperInterface
     */
    public function createCartNoteQuoteMapper(): CartNoteQuoteMapperInterface
    {
        return new CartNoteQuoteMapper();
    }
}
