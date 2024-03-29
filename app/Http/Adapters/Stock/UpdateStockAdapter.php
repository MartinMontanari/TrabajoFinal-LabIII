<?php


namespace App\Http\Adapters\Stock;


use App\Application\Commands\Stock\UpdateStockCommand;
use App\Exceptions\InvalidBodyException;
use App\Http\Schemas\Stock\UpdateStockSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateStockAdapter
{
    /**
     * @param Request $request
     * @return UpdateStockCommand
     * @throws InvalidBodyException
     */
    public function adapt(Request $request) : UpdateStockCommand
    {
        $validate = Validator::make($request->all(), UpdateStockSchema::getRules(), UpdateStockSchema::getMessages());

        if ($validate->fails()) {
            throw new InvalidBodyException($validate->errors()->getMessages());
        }
        return new UpdateStockCommand(
            $request->input('product_id'),
            $request->input('quantity')
        );
    }
}
