<?php

namespace FondOfSpryker\Zed\CartNotesRestApi\Business\Mapper;

use FondOfSpryker\Zed\CartNotesRestApi\Dependency\Facade\CartNotessRestApiToCartNoteFacadeInterface;
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
        $restCartNoteTransfer = $restCheckoutRequestAttributesTransfer->getCartNote();

        if ($restCartNoteTransfer === null) {
            return $quoteTransfer;
        }

        $quoteTransfer
            ->setCartNote($restCartNoteTransfer->getMessage());

        return $quoteTransfer;
    }
}
