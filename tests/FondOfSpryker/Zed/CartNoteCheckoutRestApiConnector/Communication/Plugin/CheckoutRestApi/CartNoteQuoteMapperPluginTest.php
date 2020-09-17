<?php

namespace FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Communication\Plugin\CheckoutRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Communication\Plugin\CheckoutRestApi\CartNoteQuoteMapperPlugin;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorFacade;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class CartNoteQuoteMapperPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Communication\Plugin\CheckoutRestApi\CartNoteQuoteMapperPlugin
     */
    protected $cartNoteQuoteMapperPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCheckoutRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\CartNoteCheckoutRestApiConnectorFacade
     */
    protected $cartNoteCheckoutRestApiConnectorFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->cartNoteCheckoutRestApiConnectorFacadeMock = $this->getMockBuilder(CartNoteCheckoutRestApiConnectorFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCheckoutRequestAttributesTransferMock = $this->getMockBuilder(RestCheckoutRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->cartNoteQuoteMapperPlugin = new CartNoteQuoteMapperPlugin();
        $this->cartNoteQuoteMapperPlugin->setFacade($this->cartNoteCheckoutRestApiConnectorFacadeMock);
    }

    /**
     * @return void
     */
    public function testMap(): void
    {
        $this->cartNoteCheckoutRestApiConnectorFacadeMock->expects($this->atLeastOnce())
            ->method('mapCartNoteToQuote')
            ->with(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )->willReturn($this->quoteTransferMock);

        $this->assertInstanceOf(
            QuoteTransfer::class,
            $this->cartNoteQuoteMapperPlugin->map(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
        );
    }
}