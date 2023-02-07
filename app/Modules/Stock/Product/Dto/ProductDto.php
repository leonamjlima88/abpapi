<?php

namespace App\Modules\Stock\Product\Dto;

use Spatie\LaravelData\Attributes\Validation\Rule;
use Spatie\LaravelData\Data;

class ProductDto extends Data
{
  public static function authorize(): bool
  {
    return true;
  }  

  public function __construct(
    #[Rule('nullable|integer')]
    public ?int $id,

    #[Rule('required|string|max:255')]
    public string $name,

    #[Rule('required|string|max:30')]
    public string $simplified_name,

    #[Rule('required|integer')]
    public int $type,

    #[Rule('nullable|string|max:45')]
    public ?string $sku_code,

    #[Rule('nullable|string|max:45')]
    public ?string $ean_code,

    #[Rule('nullable|string|max:45')]
    public ?string $manufacturing_code,

    #[Rule('nullable|string|max:45')]
    public ?string $identification_code,

    #[Rule('nullable|numeric|min:0')]
    public ?float $cost,

    #[Rule('nullable|numeric|min:0')]
    public ?float $profit,

    #[Rule('nullable|numeric|min:0')]
    public ?float $price,

    #[Rule('nullable|numeric|min:0')]
    public ?float $current_quantity,

    #[Rule('nullable|numeric|min:0')]
    public ?float $minimum_quantity,

    #[Rule('nullable|numeric|min:0')]
    public ?float $maximum_quantity,

    #[Rule('nullable|numeric|min:0')]
    public ?float $gross_weight,

    #[Rule('nullable|numeric|min:0')]
    public ?float $net_weight,

    #[Rule('nullable|numeric|min:0')]
    public ?float $packing_weight,

    #[Rule('nullable|boolean')]
    public ?bool $is_to_move_the_stock,

    #[Rule('nullable|boolean')]
    public ?bool $is_product_for_scales,

    #[Rule('nullable|string')]
    public ?string $internal_note,

    #[Rule('nullable|string')]
    public ?string $complement_note,

    #[Rule('nullable|boolean')]
    public ?bool $is_discontinued,

    #[Rule('required|integer')]
    public int $unit_id,

    #[Rule('required|integer')]
    public int $ncm_id,

    #[Rule('nullable|integer')]
    public ?int $category_id,

    #[Rule('nullable|integer')]
    public ?int $brand_id,

    #[Rule('nullable|integer')]
    public ?int $size_id,

    #[Rule('nullable|integer')]
    public ?int $storage_location_id,

    #[Rule('nullable|integer')]
    public ?int $genre,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $created_at,

    #[Rule('nullable|date_format:Y-m-d H:i:s')]
    public ?string $updated_at,

    #[Rule('nullable|integer')]
    public ?int $created_by_user_id,

    #[Rule('nullable|integer')]
    public ?int $updated_by_user_id,

    #[Rule('nullable|integer')]
    public ?int $tenant_id,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $unit,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $ncm,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $category,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $brand,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $size,

    // Campo virtual
    #[Rule('nullable')]
    public object|array|null $storage_location,
  ){
  }
}
