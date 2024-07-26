<!-- resources/views/partials.login-form.blade.php -->

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div style="width: 100%; display: flex; flex-direction: column; gap: 0.5rem;">
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
