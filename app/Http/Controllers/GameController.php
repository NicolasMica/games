<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Game::with('player_a', 'player_b')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Game
     */
    public function store(Request $request)
    {
        $data = $this->validates($request);

        return Game::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $game
     * @return Game|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($game)
    {
        return Game::with('player_a', 'player_b')->findOrFail($game);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Game $game
     * @return bool
     */
    public function update(Request $request, Game $game)
    {
        $data = $this->validates($request);

        return $game->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game $game
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        return $game->delete();
    }

    /**
     * Game validation rules
     * @param Request $request
     * @return mixed - Validated data array
     */
    protected function validates(Request $request) {
        return $request->validate([
            'player_a' => 'required|different:player_b|exists:players,id',
            'player_b' => 'required|different:player_a|exists:players,id',
            'score_a'  => 'required|numeric|min:0',
            'score_b'  => 'required|numeric|min:0'
        ]);
    }
}
