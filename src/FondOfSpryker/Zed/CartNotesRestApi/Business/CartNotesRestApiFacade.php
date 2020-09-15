<?php

namespace FondOfSpryker\Zed\CartNotesRestApi\Business;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\CartNotesRestApi\Business\CartNotesRestApiBusinessFactory getFactory()
 */
class CartNotesRestApiFacade extends AbstractFacade implements CartNotesRestApiFacadeInterface
{

    /**
     * {@inheritdoc}
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
