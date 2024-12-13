<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Information;

class Context extends Model
{
    use HasFactory;

    protected $table = 'contexts';
    protected $fillable = ['title'];

    // Method to fetch information based on the 'type' column in Information table
    public function getInformationsByType()
    {
        return $this->hasMany(Information::class, 'type', 'id'); // Assuming 'type' is a foreign key to context ID
    }
    
}

