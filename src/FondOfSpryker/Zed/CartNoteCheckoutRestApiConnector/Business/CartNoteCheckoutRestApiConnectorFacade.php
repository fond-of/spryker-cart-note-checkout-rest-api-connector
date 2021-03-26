<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorBusinessFactory getFactory()
 */
class CartNoteCheckoutRestApiConnectorFacade extends AbstractFacade implements CartNoteCheckoutRestApiConnectorFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function mapCartNoteToQuote(
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        QuoteTransfer $quoteTransfer
    ): QuoteTransfer {
        return $this->getFactory()
            ->createCartNoteQuoteMapper()
            ->mapCartNoteToQuote($restCheckoutRequestAttributesTransfer, $quoteTransfer);
    }
}
