@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-wrapper">
        <!-- Logo Codexa (mismo estilo que en el dashboard) -->
        <div class="auth-logo" onclick="window.location='{{ url('/') }}'">
            <span class="gold-text">COD</span>EXA
        </div>

        <!-- Tarjeta de Registro -->
        <div class="auth-card">
            <div class="auth-header">
                <h2><span class="gold-text">Crear</span> Cuenta</h2>
                <p>Únete a nuestra comunidad de lectores</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf

                <!-- Campo Nombre -->
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user gold-text"></i> Nombre Completo
                    </label>
                    <input id="name" type="text" class="form-control" 
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                           placeholder="Ingresa tu nombre completo">
                </div>

                <!-- Campo Email -->
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope gold-text"></i> Correo Electrónico
                    </label>
                    <input id="email" type="email" class="form-control" 
                           name="email" value="{{ old('email') }}" required autocomplete="email"
                           placeholder="tucorreo@ejemplo.com">
                </div>

                <!-- Campo Contraseña -->
                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock gold-text"></i> Contraseña
                    </label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control" 
                               name="password" required autocomplete="new-password"
                               placeholder="••••••••">
                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Campo Confirmar Contraseña -->
                <div class="form-group">
                    <label for="password-confirm" class="form-label">
                        <i class="fas fa-lock gold-text"></i> Confirmar Contraseña
                    </label>
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control" 
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="••••••••">
                        <span class="toggle-password" onclick="togglePasswordVisibility('password-confirm')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Botón de Registro -->
                <button type="submit" class="auth-btn">
                    <i class="fas fa-user-plus"></i> Registrarse
                </button>

                <!-- Enlace a Login -->
                <div class="auth-link">
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
                </div>
            </form>
        </div>

        <!-- Footer del Registro -->
        <div class="auth-footer">
            <p>© {{ date('Y') }} Codexa. Todos los derechos reservados.</p>
        </div>
    </div>
</div>

<style>
    /* Estilos base consistentes con el dashboard */
    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #000;
        font-family: 'Montserrat', sans-serif;
        padding: 20px;
        animation: fadeIn 0.5s ease;
    }

    .auth-wrapper {
        width: 100%;
        max-width: 450px;
    }

    .gold-text {
        color: #FFD700;
        font-weight: 600;
    }

    /* Logo (mismo estilo que el header del dashboard) */
    .auth-logo {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: 2px;
        text-align: center;
        margin-bottom: 30px;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .auth-logo:hover {
        transform: translateY(-3px);
    }

    /* Tarjeta de Registro */
    .auth-card {
        background: rgba(20, 20, 20, 0.9);
        border-radius: 5px;
        padding: 40px;
        border: 1px solid rgba(255, 215, 0, 0.1);
        transition: all 0.3s ease;
        animation: fadeInUp 0.6s ease;
    }

    .auth-card:hover {
        box-shadow: 0 15px 30px rgba(255, 215, 0, 0.1);
        border-color: rgba(255, 215, 0, 0.3);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        color: #fff;
        margin-bottom: 10px;
    }

    .auth-header p {
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

    .form-control {
        width: 100%;
        padding: 12px 15px;
        background: rgba(30, 30, 30, 0.8);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 4px;
        color: #fff;
        font-size: 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #FFD700;
        box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.2);
    }

    .input-group {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .toggle-password:hover {
        color: #FFD700;
    }

    /* Botón (mismo estilo que en el dashboard) */
    .auth-btn {
        width: 100%;
        padding: 14px;
        background-color: #FFD700;
        color: #000;
        border: none;
        border-radius: 4px;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        cursor: pointer;
        margin: 20px 0;
        transition: all 0.3s ease;
        border: 2px solid #FFD700;
    }

    .auth-btn:hover {
        background-color: transparent;
        color: #FFD700;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3);
    }

    .auth-btn i {
        margin-right: 8px;
    }

    /* Enlace */
    .auth-link {
        text-align: center;
        color: #999;
        font-size: 14px;
    }

    .auth-link a {
        color: #FFD700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .auth-link a:hover {
        text-decoration: underline;
        transform: translateY(-2px);
    }

    /* Footer */
    .auth-footer {
        text-align: center;
        margin-top: 30px;
        color: #666;
        font-size: 13px;
    }

    /* Animaciones */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 480px) {
        .auth-card {
            padding: 30px 20px;
        }
        
        .auth-header h2 {
            font-size: 24px;
        }
        
        .auth-logo {
            font-size: 24px;
        }
    }
</style>

<script>
    function togglePasswordVisibility(fieldId) {
        const passwordInput = document.getElementById(fieldId);
        const toggleIcon = document.querySelector(`#${fieldId} + .toggle-password i`);
        
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