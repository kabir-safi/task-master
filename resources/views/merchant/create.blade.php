@extends('layouts.app-master')
@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Add new user</h1>
        <div class="lead">
            Add new user and assign role.
        </div>
        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}"
                           type="text"
                           class="form-control"
                           name="name"
                           placeholder="Name" required>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ old('email') }}"
                           type="email"
                           class="form-control"
                           name="email"
                           placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input value="{{ old('password') }}"
                           type="password"
                           class="form-control"
                           name="password"
                           placeholder="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="domain" class="form-label">Domain</label>
                    <input value="{{ old('domain') }}"
                           type="text"
                           class="form-control"
                           name="domain"
                           placeholder="Domain" required>
                    @if ($errors->has('domain'))
                        <span class="text-danger text-left">{{ $errors->first('domain') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="display_name" class="form-label">Display Name</label>
                    <input value="{{ old('display_name') }}"
                           type="text"
                           class="form-control"
                           name="display_name"
                           placeholder="Display Name" required>
                    @if ($errors->has('display_name'))
                        <span class="text-danger text-left">{{ $errors->first('display_name') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save user</button>
                <a href="{{ route('merchant.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>
@endsection
