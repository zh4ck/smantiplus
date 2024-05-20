<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Information extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'informations';

    protected $fillable = [
        'title',
        'slug',
        'imgInfo',
        'status',
        'description',
        'type_id',
        'category_id',
        'writer_id',
        'administrator_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug'=> [
                'source'=> ['title', 'id']
            ]
        ];
    }

    /**
     * The categories that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'info_category', 'info_id', 'category_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'writer_id', 'id');
    }

    public function writerAdmin(): BelongsTo
    {
        return $this->belongsTo(Administrator::class, 'administrator_id', 'id');
    }
}