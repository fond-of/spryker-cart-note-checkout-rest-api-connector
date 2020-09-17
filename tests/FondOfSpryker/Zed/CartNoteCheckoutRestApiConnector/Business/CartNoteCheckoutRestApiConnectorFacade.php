<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorBusinessFactory;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapperInterface;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class CartNoteCheckoutRestApiConnectorFacade extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapperInterface
     */
    protected $cartNoteCheckoutRestApiConnectorFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorBusinessFactory
     */
    protected $cartNoteCheckoutRestApiConnectorBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapperInterface
     */
    protected $cartNoteQuoteMapperMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCheckoutRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->cartNoteCheckoutRestApiConnectorBusinessFactoryMock = $this->getMockBuilder(CartNoteCheckoutRestApiConnectorBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->cartNoteQuoteMapperMock = $this->getMockBuilder(CartNoteQuoteMapperInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCheckoutRequestAttributesTransferMock = $this->getMockBuilder(RestCheckoutRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->cartNoteCheckoutRestApiConnectorFacade = new CartNoteCheckoutRestApiConnectorFacade();
        $this->cartNoteCheckoutRestApiConnectorFacade->setFactory($this->cartNoteCheckoutRestApiConnectorBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testMapCartNoteToQuote(): void
    {
        $this->orderCustomReferenceCheckoutRestApiConnectorRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createCartNoteQuoteMapper')
            ->willReturn($this->orderCustomReferenceQuoteMapperMock);

        $this->cartNoteQuoteMapperMock->expects($this->atLeastOnce())
            ->method('mapCartNoteToQuote')
            ->with(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
            ->willReturn($this->quoteTransferMock);

        $this->assertInstanceOf(
            QuoteTransfer::class,
            $this->cartNoteCheckoutRestApiConnectorFacade->mapCartNoteToQuote(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
        );
    }

}
