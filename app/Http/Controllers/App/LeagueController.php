<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeagueFormRequest;
use App\Models\League;
use Carbon\Carbon;

class LeagueController extends Controller
{
    public function index() {
        $items = League::with([])
            ->orderBy('id', 'asc')
            ->get();
        return view('league.index', ['items' => $items]);
    }

    public function add() {
        return view('league.add');
    }

    public function create(LeagueFormRequest $request) {
        $data = $request->validated();

        $item = new League;

        $item->name = $data['name'];
        $item->country = $data['country'];
        $item->status = $request->status == 'Visible' ? 0 : 1;
        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();

        session()->flash('success', 'League created successfully');
        return redirect()->route('league.add');
    }

    public function edit($id) {
        $item = League::findOrFail($id);
        return view('league.edit', ['item' => $item]);
    }

    public function update(LeagueFormRequest $request, $id) {
        $data = $request->validated();

        $item = League::findOrFail($id);

        $item->name = $data['name'];
        $item->country = $data['country'];
        $item->status = $request->status == 'Visible' ? 0 : 1;
        $item->updated_at = Carbon::now();

        $item->update();

        session()->flash('success', 'League updated successfully');
        return redirect()->route('league.edit', ['id' => $item->getKey()]);
    }

    public function delete($id) {
        $item = League::findOrFail($id);

        $clubs = $item->clubs;
        foreach ($clubs as $club) {
            $players = $club->players;
            $players->each->delete();
        }
        $item->clubs()->delete();
        $item->delete();

        session()->flash('success', 'League deleted successfully');
        return redirect()->route('league');
    }
}
