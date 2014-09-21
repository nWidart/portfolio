<?php

use Illuminate\Filesystem\Filesystem;
use Nwidart\Posts\Entities\Post;

class FilePostRepositoryTest extends TestCase
{
    /**
     * @var Post
     */
    public $post;

    public function setUp()
    {
        $filesystemMock = Mockery::mock('Illuminate\Filesystem\Filesystem');

        $files = [
            '04-05-2012-comment-installer-utiliser-firephp-avec-codeigniter.md',
            '07-09-2014-new-website.md',
            '12-09-2014-db-exporter-package-review.md',
        ];

        $filesystemMock->shouldReceive('allFiles')->once()->andReturn($files);
        $filesystemMock->shouldReceive('extension')->with('00-00-0000-file.md')->andReturn(true);

        $file = 'title: Comment installer & utiliser FirePHP avec CodeIgniter
slug: comment-installer-utiliser-firephp-avec-codeigniter
status: published
date: 4 May 2012
tags: codeigniter,FirePHP,MVC
-------

# PHP
File content';
        $filesystemMock->shouldReceive('get')->atLeast(1)->andReturn($file);

        $this->post = new Post($filesystemMock);
    }

    public function tearDown()
    {
        Mockery::close();
    }

    /** @test */
    public function postAllShouldReturn()
    {
        $posts = $this->post->all();
        $this->assertCount(3, $posts->count());
    }
}