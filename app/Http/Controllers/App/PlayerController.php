<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerFormRequest;
use App\Models\Club;
use App\Models\Player;
use Carbon\Carbon;

class PlayerController extends Controller
{
    public function index() {
        $items = Player::with('club')
            ->orderBy('id', 'asc')
            ->get();
        return view('player.index', ['items' => $items]);
    }

    public function add() {
        $clubs = Club::orderBy('name')
            ->get();

        return view('player.add', ['clubs' => $clubs]);
    }

    public function create(PlayerFormRequest $request) {
        $data = $request->validated();

        $item = new Player;

        $item->club_id = $data['club_id'];
        $item->first_name = $data['first_name'];
        $item->last_name = $data['last_name'];
        $item->position = $data['position'];
        $item->date_of_birth = $data['date_of_birth'];
        $item->country = $data['country'];
        $item->height = $data['height'];
        $item->foot = $request->foot == 'Left' ? 'Left' : 'Right';
        $item->market_value = $data['market_value'];
        $item->status = $request->status == 'Visible' ? 0 : 1;
        $item->created_at = Carbon::now();
        $item->updated_at = Carbon::now();

        $item->save();

        session()->flash('success', 'Player created successfully');
        return redirect()->route('player.add');
    }

    public function edit($id) {
        $item = Player::findOrFail($id);

        $clubs = Club::orderBy('name')
            ->get();

        return view('player.edit', ['item' => $item, 'clubs' => $clubs]);
    }

    public function update(PlayerFormRequest $request, $id) {
        $data = $request->validated();

        $item = Player::findOrFail($id);

        $item->club_id = $data['club_id'];
        $item->first_name = $data['first_name'];
        $item->last_name = $data['last_name'];
        $item->position = $data['position'];
        $item->date_of_birth = $data['date_of_birth'];
        $item->country = $data['country'];
        $item->height = $data['height'];
        $item->foot = $request->foot == 'Left' ? 'Left' : 'Right';
        $item->market_value = $data['market_value'];
        $item->status = $request->status == 'Visible' ? 0 : 1;
        $item->updated_at = Carbon::now();

        $item->update();

        session()->flash('success', 'Player updated successfully');
        return redirect()->route('player.edit', ['id' => $item->getKey()]);
    }

    public function delete($id) {
        $item = Player::findOrFail($id);

        $item->delete();

        session()->flash('success', 'Player deleted successfully');
        return redirect()->route('player');
    }
}
