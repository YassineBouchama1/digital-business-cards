<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $Cards = Card::all();
        return CardResource::collection($Cards);
    }

    public function store(StoreCardRequest $request)
    {
        $Card = Card::create($request->validated());
        return new CardResource($Card);
    }

    public function update(StoreCardRequest $request, Card $Card)
    {
        $Card->update($request->validated());
        return new CardResource($Card);
    }

    public function destroy(Card $Card)
    {
        $Card->delete();
        return response(null, 204);
    }
}
