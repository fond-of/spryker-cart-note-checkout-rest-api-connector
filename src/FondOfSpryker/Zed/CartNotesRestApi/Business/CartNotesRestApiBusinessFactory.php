<?php

namespace FondOfSpryker\Zed\CartNotesRestApi\Business;

use FondOfSpryker\Zed\CartNotesRestApi\Business\Mapper\CartNoteQuoteMapper;
use FondOfSpryker\Zed\CartNotesRestApi\Business\Mapper\CartNoteQuoteMapperInterface;
use FondOfSpryker\Zed\CartNotesRestApi\CartNotesRestApiDependencyProvider;
use FondOfSpryker\Zed\CartNotesRestApi\Dependency\Facade\CartNotessRestApiToCartNoteFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class CartNotesRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CartNotesRestApi\Business\Mapper\CartNoteQuoteMapperInterface
     */
    public function createCartNoteQuoteMapper(): CartNoteQuoteMapperInterface
    {
        return new CartNoteQuoteMapper();
    }
}
