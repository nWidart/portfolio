<?php

class SiteTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testShowHomePage()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("Hi,")'));
    }

    /** @test */
    public function showsAboutPage()
    {
        $crawler = $this->client->request('GET', '/about');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("About me")'));
    }

    /** @test */
    public function showsBlogPage()
    {
        $crawler = $this->client->request('GET', '/blog');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("Blog")'));
    }

    /** @test */
    public function showsProjectsPage()
    {
        $crawler = $this->client->request('GET', '/projects');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("Projects")'));
    }

    /** @test */
    public function showsBooksPage()
    {
        $crawler = $this->client->request('GET', '/book-library');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h2:contains("Books I\'ve read")'));
    }
}
