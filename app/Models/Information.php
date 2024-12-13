<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Information extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'type',
        'title',
        'slug',
        'gdocs',
        'description',
        'image',
        'file'
    ];

    /**
     * Configure the sluggable behavior for the model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    /**
     * Define the relationship to the Context model based on type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contextType(): BelongsTo
    {
        return $this->belongsTo(Context::class, 'type', 'id');
    }

    /**
     * Define a many-to-many relationship to the Context model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
   

    public function get_contexts()
    {
        return $this->belongsToMany(Context::class, 'informations_contexts', 'information_id', 'context_id');
    }
    

}
