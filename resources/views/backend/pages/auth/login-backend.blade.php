@extends('backend.pages.auth.loginForm')

@section('loginbackend')

<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="{{ route('home') }}"> <h4>PMS LOGIN</h4></a><br>
    
                            <form action="{{route('login.submit')}}" method="post" enctype="multipart/form-data">
                                @csrf
                    
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <input name="email" value="{{old('email')}}" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="inputPassword" value="{{old('password')}}" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                            <div class="small text-right"><br>
                                Click <a href="{{route('home')}}">here</a> to go home
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
