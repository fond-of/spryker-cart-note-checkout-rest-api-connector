<?php

namespace FondOfSpryker\Zed\CartNoteQuoteCheckoutRestApiConnector\Business\CompanyUnitAddress;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapper;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCartNoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;

class CartNoteQuoteMapperTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\CartNoteCheckoutRestApiConnector\Business\Mapper\CartNoteQuoteMapper
     */
    protected $cartNoteQuoteMapper;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCompanyUnitAddressesRequestAttributesTransfer
     */
    protected $restCheckoutRequestAttributesTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\RestCartNoteTransfer
     */
    protected $restCartNoteTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteTransfer
     */
    protected $quoteTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->restCheckoutRequestAttributesTransferMock = $this->getMockBuilder(RestCheckoutRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCompanyUnitAddressesRequestAttributesTransferMock = $this->getMockBuilder(RestCompanyUnitAddressesRequestAttributesTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->restCartNoteTransferMock = $this->getMockBuilder(RestCartNoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteTransferMock = $this->getMockBuilder(QuoteTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->cartNoteQuoteMapper = new CartNoteQuoteMapper();
    }

    /**
     * @return void
     */
    public function testMapCartNoteToQuote(): void
    {
        $cartNoteMessage = 'message';
        $this->restCheckoutRequestAttributesTransferMock->expects($this->atLeastOnce())
            ->method('getCartNote')
            ->willReturn($this->restCartNoteTransferMock);

         $this->restCartNoteTransferMock->expects($this->atLeastOnce())
             ->method('getMessage')
             ->willReturn($cartNoteMessage);

        $this->assertInstanceOf(
            QuoteTransfer::class,
            $this->cartNoteQuoteMapper->mapCartNoteToQuote(
                $this->restCheckoutRequestAttributesTransferMock,
                $this->quoteTransferMock
            )
        );

        $this->assertEquals($cartNoteMessage, $this->restCartNoteTransferMock->getMessage());
    }
}