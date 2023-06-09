@extends('layout.auth')

@section('content')
    <div class="card col-lg-4 mx-auto">
        <div class="card-body px-5 py-5">
            <h3 class="card-title text-left mb-3">Login</h3>
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf

                <div class="form-group">
                    <label>Email *</label>
                    <input type="text" class="form-control p_input" value="{{ old('email') }}" id="email" name="email" placeholder="Email">
                    @error('email')
                    <span class="text-danger text-small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password *</label>
                    <input type="password" class="form-control p_input" id="password" name="password" placeholder="********">
                    @error('password')
                    <span class="text-danger text-small">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
