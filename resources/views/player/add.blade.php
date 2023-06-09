@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Add Player</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <a href="{{ route('player') }}">
                        <button class="btn btn-danger">Cancel</button>
                    </a>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Creation Form</h4>
                        <form class="forms-sample" method="POST" action="{{ url('players/create') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="club_id">Club</label>
                                <select class="form-control" id="club_id" name="club_id">
                                    @foreach($clubs as $club)
                                        <option {{ old('club_id') == $club->getKey() ? 'selected' : '' }} value="{{ $club->getKey() }}">{{ $club->name }}</option>
                                    @endforeach
                                </select>
                                @error('club_id')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" value="{{ old('first_name') }}" id="first_name" name="first_name" placeholder="First name">
                                @error('first_name')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-control" value="{{ old('last_name') }}" id="last_name" name="last_name" placeholder="Last name">
                                @error('last_name')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <select class="form-control" id="position" name="position">
                                    @foreach (config('positions') as $key => $value)
                                        <option value="{{ $key }}" {{ old('position') === $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <input type="date" class="form-control" value="{{ old('date_of_birth') }}" id="date_of_birth" name="date_of_birth" placeholder="Date of birth">
                                @error('date_of_birth')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nationality">Country</label>
                                <input type="text" class="form-control" value="{{ old('country') }}" id="country" name="country" placeholder="Country">
                                @error('country')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="height">Height</label>
                                <input type="number" class="form-control" value="{{ old('height') }}" id="height" name="height" placeholder="Height">
                                @error('height')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foot">Foot</label>
                                <select class="form-control" id="foot" name="foot">
                                    <option {{ old('foot') === 'Left' ? 'selected' : '' }}>Left</option>
                                    <option {{ old('foot') === 'Right' ? 'selected' : '' }}>Right</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="market_value">Market value</label>
                                <input type="number" class="form-control" value="{{ old('market_value') }}" id="market_value" name="market_value">
                                @error('market_value')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option>Visible</option>
                                    <option>Invisible</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
