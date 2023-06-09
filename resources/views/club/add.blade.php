@extends('layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Add Club</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <a href="{{ route('club') }}">
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
                        <form class="forms-sample" method="POST" action="{{ url('clubs/create') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="status">League</label>
                                <select class="form-control" id="league_id" name="league_id">
                                    @foreach($leagues as $league)
                                        <option {{ old('league_id') == $league->getKey() ? 'selected' : '' }} value="{{ $league->getKey() }}">{{ $league->name }}</option>
                                    @endforeach
                                </select>
                                @error('league_id')
                                <span class="text-danger text-small">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="country">Club</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" placeholder="Club">
                                @error('name')
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
