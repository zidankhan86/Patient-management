@extends('frontend.master')

  @section('content')
 <!-- breedcrumb section start  -->
 <div class="section breedcrumb">
  <div class="breedcrumb__img-wrapper">
    <img src="{{asset ('frontend/src/images/banner/breedcrumb.jpg') }}" alt="breedcrumb" />
    <div class="container">
      <ul class="breedcrumb__content">
        <li>
          <a href="{{ route('home') }}">
            <svg
              width="18"
              height="19"
              viewBox="0 0 18 19"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1 8L9 1L17 8V18H12V14C12 13.2044 11.6839 12.4413 11.1213 11.8787C10.5587 11.3161 9.79565 11 9 11C8.20435 11 7.44129 11.3161 6.87868 11.8787C6.31607 12.4413 6 13.2044 6 14V18H1V8Z"
                stroke="#808080"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <span> > </span>
          </a>
        </li>
        <li class="active"><a href="#">Sign in</a></li>
      </ul>
    </div>
  </div>
</div>
<!-- breedcrumb section end   -->

<!-- Sign-in Section Start  -->
<section class="sign-in section section--xl">
  <div class="container">
    <div class="form-wrapper">
      <h6 class="font-title--sm">Sign in</h6>
      <form action="{{route('login.submit')}}" method="post">
        @csrf
        <div class="form-input">
          <input type="email" name="email" placeholder="Email" />
          <span class="icon icon-warning">
            <svg
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M10.0003 18.8333C14.6027 18.8333 18.3337 15.1024 18.3337 10.5C18.3337 5.89762 14.6027 2.16666 10.0003 2.16666C5.39795 2.16666 1.66699 5.89762 1.66699 10.5C1.66699 15.1024 5.39795 18.8333 10.0003 18.8333Z"
                stroke="#FF8A00"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 7.16666V10.5"
                stroke="#FF8A00"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 13.8333H10.0083"
                stroke="#FF8A00"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
          <span class="icon icon-error">
            <svg
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M8.57465 3.21667L1.51632 15C1.37079 15.252 1.29379 15.5378 1.29298 15.8288C1.29216 16.1198 1.36756 16.4059 1.51167 16.6588C1.65579 16.9116 1.86359 17.1223 2.11441 17.2699C2.36523 17.4175 2.65032 17.4968 2.94132 17.5H17.058C17.349 17.4968 17.6341 17.4175 17.8849 17.2699C18.1357 17.1223 18.3435 16.9116 18.4876 16.6588C18.6317 16.4059 18.7071 16.1198 18.7063 15.8288C18.7055 15.5378 18.6285 15.252 18.483 15L11.4247 3.21667C11.2761 2.97176 11.0669 2.76927 10.8173 2.62874C10.5677 2.48821 10.2861 2.41438 9.99965 2.41438C9.71321 2.41438 9.43159 2.48821 9.18199 2.62874C8.93238 2.76927 8.72321 2.97176 8.57465 3.21667V3.21667Z"
                stroke="#EA4B48"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 7.5V10.8333"
                stroke="#EA4B48"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 14.1667H10.0083"
                stroke="#EA4B48"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
          <span class="icon icon-success">
            <svg
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.6663 5.5L7.49967 14.6667L3.33301 10.5"
                stroke="#00B307"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </div>
        <div class="form-input">
          <input type="password" name="password" placeholder="Password" id="password" />
          <button
            type="button"
            class="icon icon-eye"
            onclick="showPassword('password',this)"
          >
            <svg
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1.66663 10.5003C1.66663 10.5003 4.69663 4.66699 9.99996 4.66699C15.3033 4.66699 18.3333 10.5003 18.3333 10.5003C18.3333 10.5003 15.3033 16.3337 9.99996 16.3337C4.69663 16.3337 1.66663 10.5003 1.66663 10.5003Z"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 13C10.663 13 11.2989 12.7366 11.7678 12.2678C12.2366 11.7989 12.5 11.163 12.5 10.5C12.5 9.83696 12.2366 9.20107 11.7678 8.73223C11.2989 8.26339 10.663 8 10 8C9.33696 8 8.70107 8.26339 8.23223 8.73223C7.76339 9.20107 7.5 9.83696 7.5 10.5C7.5 11.163 7.76339 11.7989 8.23223 12.2678C8.70107 12.7366 9.33696 13 10 13V13Z"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
          <span class="icon icon-warning">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="21"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-eye"
            >
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
              <circle cx="12" cy="12" r="3"></circle>
            </svg>
          </span>
          <span class="icon icon-error">
            <svg
              width="20"
              height="20"
              viewBox="0 0 20 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M8.57465 3.21667L1.51632 15C1.37079 15.252 1.29379 15.5378 1.29298 15.8288C1.29216 16.1198 1.36756 16.4059 1.51167 16.6588C1.65579 16.9116 1.86359 17.1223 2.11441 17.2699C2.36523 17.4175 2.65032 17.4968 2.94132 17.5H17.058C17.349 17.4968 17.6341 17.4175 17.8849 17.2699C18.1357 17.1223 18.3435 16.9116 18.4876 16.6588C18.6317 16.4059 18.7071 16.1198 18.7063 15.8288C18.7055 15.5378 18.6285 15.252 18.483 15L11.4247 3.21667C11.2761 2.97176 11.0669 2.76927 10.8173 2.62874C10.5677 2.48821 10.2861 2.41438 9.99965 2.41438C9.71321 2.41438 9.43159 2.48821 9.18199 2.62874C8.93238 2.76927 8.72321 2.97176 8.57465 3.21667V3.21667Z"
                stroke="#EA4B48"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 7.5V10.8333"
                stroke="#EA4B48"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M10 14.1667H10.0083"
                stroke="#EA4B48"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
          <span class="icon icon-success">
            <svg
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M16.6663 5.5L7.49967 14.6667L3.33301 10.5"
                stroke="#00B307"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </span>
        </div>
        <div class="form-wrapper__content">
          
      
        </div>
        <div class="form-button">
          <button class="button button--md w-100">Login</button>
        </div>
        <div class="form-register">
          Don't have account ? <a href="{{ route('registration') }}">Register</a>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- Sign-in Section end  -->

@endsection