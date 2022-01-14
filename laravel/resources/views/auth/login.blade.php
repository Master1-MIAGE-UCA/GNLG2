<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif
        }

        body {
            background: #2c323f
        }

        .wrapper {
            max-width: 350px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #ecf0f3;
            border-radius: 15px;

        }

        .logo {
            width: 80px;
            margin: auto
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: fill;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
        }

        .wrapper .name {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 1.3px;
            padding-left: 10px;
            color: #555
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
        }

        .wrapper .form-field .fas {
            color: #555
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #FFC44C;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
            letter-spacing: 1.3px
        }

        .wrapper .btn:hover {
            background-color: #efa106
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #03A9F4
        }

        .wrapper a:hover {
            color: #039BE5
        }

        @media (max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px
            }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="logo"><x-application-logo class="w-20 h-20 fill-current text-gray-300" />
    </div>
    <div class="text-center mt-4 name"> </div>

    <form method="POST" action="{{ route('login') }}" class="p-3 mt-3">
        @csrf
        <div class="form-field d-flex align-items-center"><span class="far fa-user"></span> <input type="email"
                                                                                                   name="email"
                                                                                                   id="email"
                                                                                                   placeholder="Email"
                                                                                                   :value="old('email')"
                                                                                                   required autofocus>
        </div>

        <div class="form-field d-flex align-items-center"><span class="fas fa-key"></span> <input type="password"
                                                                                                  name="password"
                                                                                                  id="password"
                                                                                                  placeholder="Mot de passe"
                                                                                                  required
                                                                                                  autocomplete="current-password">
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <button class="btn mt-3">Se connecter</button>
    </form>

    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
               name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
    </label>
    <div class="row"></div>
    <div class="row">
        @if (Route::has('password.request'))
            <div class="text-center fs-6"><a href="{{ route('password.request') }}">Mot de passe oublié?</a></div>
        @endif
    </div>

</div>
</body>
</html>
