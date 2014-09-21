<?php

class ExampleTest extends TestCase
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
    }

    /** @test */
    public function showsAboutPage()
    {
        $crawler = $this->client->request('GET', '/about');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("About me")'));
    }

    /** @test */
    public function showsProjectsPage()
    {
        $crawler = $this->client->request('GET', '/projects');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertCount(1, $crawler->filter('h1:contains("Projects")'));
    }
}
