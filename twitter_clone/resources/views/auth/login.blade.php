@section('title','Login')

<x-layout>
    @if (session()->has('success'))
    <x-success-message :message="session('success')" />
    @endif
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{route('auth.session')}}" method="POST">
                @csrf
                <h3 class="text-center text-dark">Login</h3>

                <div class="form-group">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class=" form-control">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <button type="submit" class="btn btn-dark btn-md" value="submit">Login</button>
                </div>
                <div class="text-right mt-2">
                    <a href="/register" class="text-dark">Register here</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>