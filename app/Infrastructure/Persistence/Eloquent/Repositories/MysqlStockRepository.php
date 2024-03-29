<?php


namespace App\Infrastructure\Persistence\Eloquent\Repositories;


use App\Domain\Entities\Stock;
use App\Domain\Interfaces\StockRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class MysqlStockRepository implements StockRepository
{

    /**
     * @param Stock $stock
     */
    public function persist(Stock $stock): void
    {
        $stock->save();
    }

    /**
     * @param int $product_id
     * @return Stock
     */
    public function getProductStock(int $product_id): Stock
    {
        return Stock::query()
            ->where('product_id', '=', $product_id)
            ->first();
    }

    /**
     * @param int $min
     * @return LengthAwarePaginator|mixed
     */
    public function filterProductsByStock(int $min)
    {
        return Stock::query()
            ->where('quantity', '<=', $min)
            ->paginate(10);
    }

    /**
     * @return Builder[]|Collection|mixed
     */
    public function fetchStockOfAllActiveProducts()
    {
        return Stock::query()
            ->where('quantity','>',0)
            ->get();
    }
}
