<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;


class Team extends Model 

{

   
    use HasFactory;
    protected $table='team';

    // public $sortable = [
    //     'order_column_name' => 'order',
    //     'sort_when_creating' => true,
    // ];
    public function setOrder($order)
{
    $this->order = $order;
    $this->save();
}

    protected $fillable = [
        // other columns...
        'order','role','name', 'position', 'image', 'contact_number','email'
    ];


}
