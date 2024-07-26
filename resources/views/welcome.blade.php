<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        /* Custom styles */
        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            overflow: hidden; /* Prevent horizontal scroll */
        }
        .container {
            display: flex;
            height: 100vh;
            position: relative;
        }
        .bg-left-green {
            background-color: #6e8C48;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden; /* Ensure no overflow from the image */
        }
        .bg-right-white {
            background-color: rgb(245, 235, 235);
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 2rem;
        }
        .button-container {
            margin-top: 1rem; /* Space above buttons */
            display: flex;
            gap: 1rem; /* Space between buttons */
        }
        .button {
            background-color: gray; /* Button color */
            color: white;
            padding: 0.75rem 1.5rem; /* Increased padding */
            border: none;
            border-radius: 0.375rem; /* Rounded corners */
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove underline from links */
            display: inline-block; /* Make links behave like buttons */
            text-align: center; /* Center text inside button */
        }
        .button:hover {
            background-color: darkgreen; /* Dark green on hover */
        }
        .welcome-text {
            color: black;
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem; /* Adjusted space below text */
        }
        .logo {
            width: 300px; /* Adjust size as needed */
            margin-bottom: 2rem; /* Adjusted space below logo */
        }
        .small-image {
            width: 30vw; /* Small size for the image */
            height: 100vh; /* Maintain aspect ratio */
            position: absolute;
            bottom: 0rem; /* Ensure image is positioned correctly */
            left: 10rem;
            z-index: 5; /* Ensure image is above other content if needed */
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 600px;
            padding: 2rem;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }
        .form-container form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bg-left-green">
            <img src="{{ asset('images/photo_2024-07-22_02-44-47.png') }}" alt="Green Logo" class="small-image">
        </div>
        <div class="bg-right-white">
            <img src="{{ asset('images/Green Logo.png') }}" alt="Green Logo" class="logo">
            <div class="welcome-text">Welcome</div>
            <div class="form-container" id="form-container">
                <!-- Initial content will be loaded by JavaScript -->
            </div>
        </div>
    </div>
    <script>
        function loadForm(form) {
            const formContainer = document.getElementById('form-container');
            if (form === 'register') {
                formContainer.innerHTML = `
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div style="width: 100%; display: flex; flex-direction: column; gap: 1rem;">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required style="padding: 10px; font-size: 1rem; width: 100%;">
                            
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required style="padding: 10px; font-size: 1rem; width: 100%;">
                            
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required style="padding: 10px; font-size: 1rem; width: 100%;">
                            
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required style="padding: 10px; font-size: 1rem; width: 100%;">
                            
                            <label for="role">Role:</label>
                            <select id="role" name="role" required style="padding: 10px; font-size: 1rem; width: 100%;">
                                <option value="">Select Role</option>
                                <option value="driver">Driver</option>
                                <option value="admin">Admin</option>
                                <option value="property">Property</option>
                                <option value="requester">Requester</option>
                            </select>
                            
                            <div class="button-container">
                                <button type="submit" class="button">Register</button>
                                <button type="button" class="button" id="login-button">Login</button>
                            </div>
                        </div>
                    </form>
                `;
            } else {
                formContainer.innerHTML = `
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div style="width: 100%; display: flex; flex-direction: column; gap: 1rem;">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required style="padding: 10px; font-size: 1rem; width: 100%;">
                            
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required style="padding: 10px; font-size: 1rem; width: 100%;">
                            
                            <div class="button-container">
                                <button type="submit" class="button">Login</button>
                                <button type="button" class="button" id="register-button">Register</button>
                            </div>
                        </div>
                    </form>
                `;
            }
            
            document.getElementById('register-button')?.addEventListener('click', function (event) {
                event.preventDefault();
                loadForm('register');
            });
            
            document.getElementById('login-button')?.addEventListener('click', function (event) {
                event.preventDefault();
                loadForm('login');
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            loadForm('login');
        });
    </script>
</body>
</html>
