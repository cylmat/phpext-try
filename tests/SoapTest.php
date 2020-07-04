<?php

namespace Soap;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2020-06-18 at 18:23:31.
 */
class SoapTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Index
     */
    protected $index;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
        $this->index = new Index;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown(): void {}


    public function testClient() 
    {
        //$this->index->client(); 
        $c = new \Soap\Client;
        $this->assertTrue($c->create());

        $soapClient = $this->getMockBuilder('\Soap\Client')
            ->setMethods(['getMessage'])
            ->getMock();

        $soapClient->expects($this->exactly(1))
            ->method('getMessage')
            ->with($this->stringContains('hi'));

        $c->setClient($soapClient);
        $c->call(['hi']);
    }
}