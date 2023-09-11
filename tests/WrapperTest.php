<?php

use Illuminate\Contracts\Config\Repository;
use LaravelTrello\Wrapper;
use PHPUnit\Framework\TestCase;
use Semaio\TrelloApi\Manager;

class WrapperTest extends TestCase {

    /** @test */
    public function shouldHaveToPassRepoToWrapperConstructor(): void {

        $repository = $this->getRepositoryMock();
        $wrapper    = new Wrapper($repository);
        $this->assertInstanceOf(Repository::class, $wrapper->config);

    } //end shouldHaveToPassRepoToWrapperConstructor()

    /** @test */
    public function shouldGetManagerFromWrapper(): void {

        $repository = $this->getRepositoryMock();
        $wrapper    = new Wrapper($repository);
        $this->assertInstanceOf(Manager::class, $wrapper->manager());

    } //end shouldGetManagerFromWrapper()

    /** @test */
    public function shouldNotGetMagicApiInstance(): void {

        $this->expectException(TypeError::class);
        $repository = $this->getRepositoryMock();
        $wrapper    = new Wrapper($repository);
        $wrapper->doNotExist();

    } //end shouldNotGetMagicApiInstance()

    // phpcs:disable PEAR.Commenting.FunctionComment.Missing
    private function getRepositoryMock() {

        $mock = $this->getMockBuilder(Repository::class)->getMock();

        $mock->method('get')->willReturn('');

        return $mock;

    } //end getRepositoryMock()

} //end class
