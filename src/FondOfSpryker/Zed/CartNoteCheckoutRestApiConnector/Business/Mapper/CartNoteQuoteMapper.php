<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class CartNoteQuoteMapper implements CartNoteQuoteMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function mapCartNoteToQuote(
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        QuoteTransfer $quoteTransfer
    ): QuoteTransfer {
        $cartNote = $restCheckoutRequestAttributesTransfer->getCartNote();

        if ($cartNote === null || $cartNote === '') {
            return $quoteTransfer;
        }

        $quoteTransfer->setCartNote($cartNote);

        return $quoteTransfer;
    }
}
