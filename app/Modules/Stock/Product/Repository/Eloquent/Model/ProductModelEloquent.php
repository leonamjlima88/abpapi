<?php

namespace App\Modules\Stock\Product\Repository\Eloquent\Model;

use App\Models\User;
use App\Shared\Repository\Eloquent\Model\BaseModelEloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductModelEloquent extends BaseModelEloquent
{
  use HasFactory;

  protected $table = 'product';
  protected $fillable = [
    'name',
    'simplified_name',
    'type',
    'sku_code',
    'ean_code',
    'manufacturing_code',
    'identification_code',
    'cost',
    'profit',
    'price',
    'current_quantity',
    'minimum_quantity',
    'maximum_quantity',
    'gross_weight',
    'net_weight',
    'packing_weight',
    'is_to_move_the_stock',
    'is_product_for_scales',
    'internal_note',
    'complement_note',
    'is_discontinued',
    'unit_id',
    'ncm_id',
    'category_id',
    'brand_id',
    'size_id',
    'storage_location_id',
    'genre',
    'created_by_user_id',
    'updated_by_user_id',
    'tenant_id',
  ];
  
  protected $casts = [
    'is_to_move_the_stock' => 'boolean',
    'is_product_for_scales' => 'boolean',
    'is_discontinued' => 'boolean',
  ];

  public function createdByUser()
  {
    return $this->hasOne(User::class, 'id', 'created_by_user_id');
  }

  public function updatedByUser()
  {
    return $this->hasOne(User::class, 'id', 'updated_by_user_id');
  }
}