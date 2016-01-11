<?php namespace Modules\Book\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Book extends Model
{
    use MediaRelation;

    protected $table = 'book__books';
    protected $fillable = ['name', 'status_id', 'author_name', 'url'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
