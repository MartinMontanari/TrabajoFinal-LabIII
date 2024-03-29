<?php


namespace App\Http\Adapters\Products;


use App\Application\Queries\Products\IndexProductsQuery;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Products\IndexProductSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexProductsAdapter
{
    /**
     * @param Request $request
     * @return IndexProductsQuery
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : IndexProductsQuery
    {
        $validate = Validator::make($request->all(), IndexProductSchema::getRules());

        if ($validate->fails()) {
            throw new InvalidBodyException(['Ocurrió un error.']);
        }

        return new IndexProductsQuery
        (
            $request->input('page'),
            $request->input('size')
        );
    }
}
