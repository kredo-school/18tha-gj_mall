<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font Awsome  --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Original CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .overlay-plus {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            /* Text color */
            font-size: 20px;
            /* Adjust font size as needed */
            font-weight: bold;
            /* Adjust font weight as needed */
            background-color: rgba(0, 0, 0, 0.5);
            /* Background color with transparency */
            padding: 10px 20px;
            /* Adjust padding as needed */
            z-index: 1;
            /* Ensure text is above the image */
        }
    </style>


</head>

<body>
    <main class="py-4 bg-white">
        {{-- @yield('content') --}}
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-10 mb-4">
                    <form action="">
                        <h2>Edit Profile</h2>
                        <div class="row mb-4">
                            <div class="col-8">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="fname" class="form-label">
                                            First Name
                                        </label>
                                        {{-- <input type="text" name="fname" id="fname" class="form-control" value="{{$first_name}} style="background-color: #FFFFFF;" >  --}}
                                        <input type="text" name="fname" id="fname" class="form-control"
                                            placeholder="Merhab" style="background-color: #FFFFFF;">
                                    </div>
                                    <div class="col-6">
                                        <label for="fname" class="form-label">
                                            Last Name
                                        </label>
                                        {{-- <input type="text" name="lname" id="lname" class="form-control" value="{{$last_name}} style="background-color: #FFFFFF;" >  --}}
                                        <input type="text" placeholder="Bozorgi" name="lname" id="lname"
                                            class="form-control" style="background-color: #FFFFFF;">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="email" class="form-label">
                                            Email
                                        </label>
                                        {{-- <input type="text" name="fname" id="fname" class="form-control" value="{{$email}}" style="background-color: FFFFFF;"> --}}
                                        <input type="text" name="fname" id="fname" class="form-control"
                                            placeholder="merhabbozorgi@email.com" style="background-color: #FFFFFF;">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="email" class="form-label">
                                            Password
                                        </label>
                                        <input type="text" name="fname" id="fname" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" style="position: relative; display: inline-block;">
                                <img src="{{ asset('images/seller/profile_image.jpg') }}" alt="man_picture"
                                    class="rounded rounded-circle mx-auto d-block align-middle img-fluid">

                                <label class="rounded-circle text-white d-inline overlay-plus">
                                    <input type="file" style="display: none;">
                                    +
                                </label>
                            </div>
                        </div>

                        <h2 class="mt-6">Address</h2>
                        <label for="address1" class="form-label">Address1</label>
                        <input type="text" name="address1" id="address1" class="form-control mb-4">
                        <label for="address2" class="form-label">Address2</label>
                        <input type="text" name="address2" id="address2" class="form-control mb-4">

                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="street" class="form-label">Street Address</label>
                                <input type="text" name="street" id="street" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="unitnumber" class="form-label">Unit Number</label>
                                <input type="text" name="unitnumber" id="unitnumber" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="city" class="form-label">City</label>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-4">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" name="country" id="country" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="region" class="form-label">Region</label>
                                <input type="text" name="region" id="region" class="form-control">
                            </div>
                            <div class="col-4">
                                <label for="postalcode" class="form-label">Postal Code</label>
                                <input type="text" name="postalcode" id="postalcode" class="form-control">
                            </div>
                        </div>

                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>

                        <div class="row mt-4">
                            <div class="col-4 mx-auto">
                                <button class="btn w-100 text-center text-white" style="background-color: #0AA873;">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </main>
    </div>
</body>

</html>
