<?php namespace Modules\Blog\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Blog\Repositories\PostRepository;
use Modules\Media\Support\Traits\MediaRelation;
use Spatie\Feed\FeedItem;

class Post extends Model implements FeedItem
{
    use Translatable, MediaRelation, PresentableTrait;

    public $translatedAttributes = ['title', 'slug', 'content'];
    protected $fillable = ['category_id', 'status', 'title', 'slug', 'content'];
    protected $table = 'blog__posts';
    protected $presenter = 'Modules\Blog\Presenters\PostPresenter';
    protected $casts = [
        'status' => 'int',
    ];

    public function category()
    {
        return $this->hasOne('Modules\Blog\Entities\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('Modules\Blog\Entities\Tag', 'blog__post_tag');
    }

    /**
     * Check if the post is in draft
     * @param Builder $query
     * @return bool
     */
    public function scopeDraft(Builder $query)
    {
        return (bool) $query->whereStatus(0);
    }

    /**
     * Check if the post is pending review
     * @param Builder $query
     * @return bool
     */
    public function scopePending(Builder $query)
    {
        return (bool) $query->whereStatus(1);
    }

    /**
     * Check if the post is published
     * @param Builder $query
     * @return bool
     */
    public function scopePublished(Builder $query)
    {
        return (bool) $query->whereStatus(2);
    }

    /**
     * Check if the post is unpublish
     * @param Builder $query
     * @return bool
     */
    public function scopeUnpublished(Builder $query)
    {
        return (bool) $query->whereStatus(3);
    }

    public function getFeedItemId()
    {
        return $this->id;
    }

    public function getFeedItemTitle()
    {
        return $this->title;
    }

    public function getFeedItemUpdated()
    {
        return $this->updated_at;
    }

    public function getFeedItemSummary()
    {
        return str_limit($this->content);
    }

    public function getFeedItemLink()
    {
        return route('en.blog.slug', $this->slug);
    }

    public function getFeedItemAuthor()
    {
        return 'Nicolas Widart';
    }

    public function getFeedItems()
    {
        return app(PostRepository::class)->all();
    }
}
