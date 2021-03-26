<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Communication\Plugin\CheckoutRestApi;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\CheckoutRestApiExtension\Dependency\Plugin\QuoteMapperPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorFacadeInterface getFacade()
 */
class CartNoteQuoteMapperPlugin extends AbstractPlugin implements QuoteMapperPluginInterface
{
    /**
     * {@inheritDoc}
     * - Maps rest request cart note message to quote.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function map(
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        QuoteTransfer $quoteTransfer
    ): QuoteTransfer {
        return $this->getFacade()
            ->mapCartNoteToQuote($restCheckoutRequestAttributesTransfer, $quoteTransfer);
    }
}
