<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'project_img', 'project_link', 'project_github', 'type_id',
    ];

    /**
     * Get the type that owns the Project
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
