<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_sepeda', 'like', '%'. $search . '%')
                         ->orWhere('id_sepeda', 'like', '%'. $search . '%')
                         ->orWhere('jenis_sepeda', 'like', '%'. $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                   $query->where('jenis_sepeda', $category);
            });
        });
    }

    public function category() {
        return $this -> belongsTo(Category::class);
    }
}
