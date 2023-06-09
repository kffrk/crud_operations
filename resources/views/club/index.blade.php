@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Clubs</h3>
            @if(Auth::user()->role_id == 1)
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <a href="{{ route('club.add') }}">
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
                                    <th>League</th>
                                    <th>Club</th>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>
                                            @if(Auth::user()->role_id == 1)
                                                <div style="display: flex; ">
                                                    <a href="{{ url('clubs/edit/' . $item->id) }}">
                                                        <button class="btn btn-success" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="mdi mdi-pencil" style="font-size: 20px; margin: auto;"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('clubs/delete/' . $item->id) }}" onclick="return confirm('Are you sure you want to delete?')">
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
                                        <td>{{ $item->league->name }}</td>
                                        <td>{{ $item->name }}</td>
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
