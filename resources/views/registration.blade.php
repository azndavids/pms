<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/form-register.css') }}" rel="stylesheet" />


</head>
<body>
    <div class="main-content">

        <!-- You only need this form and the form-register.css -->

        <form class="form-register" method="post" action="#">

            <div class="form-register-with-email">

                <div class="form-white-background">

                    <div class="form-title-row">
                        <h1>Create an account</h1>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Username</span>
                            <input type="text" name="name">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Email</span>
                            <input type="email" name="email">
                        </label>
                    </div>

                    <div class="form-row">
                        <label>
                            <span>Password</span>
                            <input type="password" name="password">
                        </label>
                    </div>

                    <div class="form-row">
                        <label class="form-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>I agree to the <a href="#">terms and conditions</a></span>
                        </label>
                    </div>

                    <div class="form-row">
                        <!-- <button type="submit">Register</button>
                        <a href="{{ url('/problems/' . $problem->id . '/edit') }}" class=>Edit</a>
                        <a href="{{action('Hazim_Form\TM_Controllers@createcase')}}" class="w3-bar-item w3-button">Register </a> -->
                        <a href="{{ url('login') }}">Registerk</a>
                    </div>

                </div>

                <a href="#" class="form-log-in-with-existing">Already have an account? Login here &rarr;</a>

            </div>

        </form>

    </div>

</body>
</html>
