<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClubFormRequest;
use App\Http\Requests\LeagueFormRequest;
use App\Models\Club;
use App\Models\League;
use Carbon\Carbon;

class ClubController extends Controller
{
    public function index() {
        $items = Club::with('league')
            ->orderBy('id', 'asc')
            ->get();
        return view('club.index', ['items' => $items]);
    }

    public function add() {
        $leagues = League::orderBy('name')
            ->get();

        return view('club.add', ['leagues' => $leagues]);
    }

    public function create(ClubFormRequest $request) {
        $data = $request->validated();

        $item = new Club;

        $item->league_id = $data['league_id'];
        $item->name = $data['name'];
        $item->status = $request->status == 'Visible' ? 0 : 1;
        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();

        session()->flash('success', 'Club created successfully');
        return redirect()->route('club.add');
    }

    public function edit($id) {
        $item = Club::findOrFail($id);

        $leagues = League::orderBy('name')
            ->get();

        return view('club.edit', ['item' => $item, 'leagues' => $leagues]);
    }

    public function update(ClubFormRequest $request, $id) {
        $data = $request->validated();

        $item = Club::findOrFail($id);

        $item->league_id = $data['league_id'];
        $item->name = $data['name'];
        $item->status = $request->status == 'Visible' ? 0 : 1;
        $item->updated_at = Carbon::now();

        $item->update();

        session()->flash('success', 'Club updated successfully');
        return redirect()->route('club.edit', ['id' => $item->getKey()]);
    }

    public function delete($id) {
        $item = Club::findOrFail($id);

        $item->players()->delete();
        $item->delete();

        session()->flash('success', 'Club deleted successfully');
        return redirect()->route('club');
    }
}
