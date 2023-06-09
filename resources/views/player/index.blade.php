@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Players</h3>
            @if(Auth::user()->role_id == 1)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <a href="{{ route('player.add') }}">
                        <button class="btn btn-success">Add</button>
                    </a>
                </ol>
            </nav>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th>Actions</th>
                                    <th>Club</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Position</th>
                                    <th>Date of birth</th>
                                    <th>Country</th>
                                    <th>Height</th>
                                    <th>Foot</th>
                                    <th>Market value</th>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>
                                            @if(Auth::user()->role_id == 1)
                                                <div style="display: flex; ">
                                                    <a href="{{ url('players/edit/' . $item->id) }}">
                                                        <button class="btn btn-success" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="mdi mdi-pencil" style="font-size: 20px; margin: auto;"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('players/delete/' . $item->id) }}" onclick="return confirm('Are you sure you want to delete?')">
                                                        <button class="btn btn-danger ms-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; margin-left: 2px;"
                                                                data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="mdi mdi-trash-can" style="font-size: 20px; margin: auto;"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            @else
                                                <div style="display: flex; align-items: center;">
                                                    <i class="mdi mdi-alert text-danger" style="font-size: 20px;"></i>
                                                    No rights to perform any actions
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $item->club->name }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ $item->date_of_birth }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ str_replace('.', ',', number_format($item->height / 100, 2)) . ' m' }}</td>
                                        <td>{{ $item->foot }}</td>
                                        <td data-sort="{{ $item->market_value }}">{{ str_replace('.', ',', number_format($item->market_value / 1000000, 2)) . ' mln EUR' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
