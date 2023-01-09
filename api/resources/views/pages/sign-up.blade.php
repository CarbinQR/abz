@extends('app')
@section('content')
    <form class="mt-5 col-6" style="margin: auto" action="{{ route('api.user.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <!-- Text input -->
        <div class="form-outline mb-4">
            <input type="text" id="form6Example3" class="form-control" name="name" value="{{ old('name') }}"/>
            <label class="form-label" for="form6Example3">Full name</label>
        </div>

        <!-- Text input -->
        <div class="form-outline mb-4">
            <input type="password" id="form6Example4" class="form-control" name="password"/>
            <label class="form-label" for="form6Example4">Password</label>
        </div>

        <div class="form-outline mb-4">
            <input type="password" id="form6Example8" class="form-control" name="password_confirmation"/>
            <label class="form-label" for="form6Example4">Retry password</label>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="text" id="form6Example5" class="form-control" name="email" value="{{ old('email') }}"/>
            <label class="form-label" for="form6Example5">Email</label>
        </div>

        <!-- Number input -->
        <div class="form-outline mb-4">
            <input type="text" id="form6Example6" class="form-control" name="phone" value="{{ old('phone') }}"/>
            <label class="form-label" for="form6Example6">Phone</label>
        </div>

        <!-- Message input -->
        <div class="form-outline mb-4">
            <select class="form-select" aria-label="Select user's position" id="form6Example7" name="position" value="{{ old('position') }}">
                <option selected value="null">Select user's position</option>
                @foreach($positions as $positionName)
                    <option value="{{ $positionName['id'] }}"> {{ $positionName['name'] }}</option>
                @endforeach
            </select>
            <label class="form-label" for="form6Example7">Position</label>
        </div>

        <div class="form-outline mb-4">
            <label for="formFileSm" class="form-label">Small file input example</label>
            <input class="form-control form-control-sm" id="formFileSm" name="file" type="file">
        </div>

        <!-- Submit button -->
        <div class="form-check d-flex justify-content-center mb-4">
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>
        </div>
    </form>
@endsection

