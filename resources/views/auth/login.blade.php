@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-wrapper">
        <!-- Logo Codexa -->
        <div class="login-logo">
            <span class="gold-text">COD</span>EXA
        </div>

        <!-- Tarjeta de Login -->
        <div class="login-card">
            <div class="login-header">
                <h2><span class="gold-text">Iniciar</span> Sesión</h2>
                <p>Accede a tu biblioteca personal</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Grupo de Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope gold-text"></i> Correo Electrónico
                    </label>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="tucorreo@ejemplo.com">
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Grupo de Contraseña -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock gold-text"></i> Contraseña
                    </label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password"
                               placeholder="••••••••">
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Opciones adicionales -->
                <div class="login-options">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Recordar sesión</label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- Botón de Login -->
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </button>

                <!-- Registro -->
                @if (Route::has('register'))
                    <div class="register-link">
                        ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
                    </div>
                @endif
            </form>
        </div>

        <!-- Footer del Login -->
        <div class="login-footer">
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
        </div>
    </div>
</div>

<style>
    /* Estilos base */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #000;
        font-family: 'Montserrat', sans-serif;
        padding: 20px;
    }

    .login-wrapper {
        width: 100%;
        max-width: 450px;
    }

    .gold-text {
        color: #FFD700;
        font-weight: 600;
    }

    /* Logo */
    .login-logo {
        font-family: 'Playfair Display', serif;
        font-size: 36px;
        font-weight: 700;
        letter-spacing: 2px;
        text-align: center;
        margin-bottom: 30px;
        color: #fff;
    }

    /* Tarjeta de Login */
    .login-card {
        background: rgba(20, 20, 20, 0.9);
        border-radius: 10px;
        padding: 40px;
        border: 1px solid rgba(255, 215, 0, 0.1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        color: #fff;
        margin-bottom: 10px;
    }

    .login-header p {
        color: #999;
        font-size: 14px;
    }

    /* Formulario */
    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        color: #fff;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .input-group {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 6px;
        color: #fff;
        font-size: 15px;
        transition: all 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #FFD700;
        box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.2);
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        cursor: pointer;
    }

    .toggle-password:hover {
        color: #FFD700;
    }

    /* Feedback de errores */
    .invalid-feedback {
        color: #ff6b6b;
        font-size: 13px;
        margin-top: 5px;
    }

    .invalid-feedback i {
        margin-right: 5px;
    }

    .is-invalid {
        border-color: #ff6b6b !important;
    }

    /* Opciones */
    .login-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        font-size: 14px;
    }

    .remember-me {
        display: flex;
        align-items: center;
    }

    .remember-me input {
        margin-right: 8px;
        accent-color: #FFD700;
    }

    .remember-me label {
        color: #ccc;
        cursor: pointer;
    }

    .forgot-password {
        color: #FFD700;
        text-decoration: none;
        transition: color 0.3s;
    }

    .forgot-password:hover {
        color: #e6c200;
        text-decoration: underline;
    }

    /* Botón de Login */
    .login-btn {
        width: 100%;
        padding: 14px;
        background-color: #FFD700;
        color: #000;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s;
        margin-bottom: 20px;
    }

    .login-btn:hover {
        background-color: #e6c200;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
    }

    .login-btn i {
        margin-right: 8px;
    }

    /* Enlace de registro */
    .register-link {
        text-align: center;
        color: #999;
        font-size: 14px;
    }

    .register-link a {
        color: #FFD700;
        text-decoration: none;
        transition: color 0.3s;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    /* Footer */
    .login-footer {
        text-align: center;
        margin-top: 30px;
        color: #666;
        font-size: 13px;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .login-card {
            padding: 30px 20px;
        }
        
        .login-header h2 {
            font-size: 24px;
        }
    }
</style>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.toggle-password i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection