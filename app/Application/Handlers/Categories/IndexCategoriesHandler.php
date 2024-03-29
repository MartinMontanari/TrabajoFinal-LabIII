<?php


namespace App\Application\Handlers\Categories;


use App\Application\Queries\Categories\IndexCategoryQuery;
use App\Domain\Interfaces\CategoryRepository;

class IndexCategoriesHandler
{
    private CategoryRepository $repository;

    /**
     * IndexCategoriesHandler constructor.
     * @param CategoryRepository $repository
     */
    public function __construct
    (
        CategoryRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param IndexCategoryQuery $query
     * @return \App\Domain\Entities\Category[]|string
     */
    public function handle(IndexCategoryQuery $query)
    {
        if($this->repository->findAll($query->getPage(), $query->getSize())!=null){
            return $this->repository->findAll($query->getPage(), $query->getSize());
        }
        else{
            return 'No hay categorías registradas.';
        }
    }
}
