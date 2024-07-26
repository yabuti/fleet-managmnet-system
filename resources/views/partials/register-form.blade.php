<!-- resources/views/partials/register-form.blade.php -->

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
