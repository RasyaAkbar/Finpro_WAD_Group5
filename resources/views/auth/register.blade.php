<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - inTel-U Academic Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <!-- Register Card -->
    <div class="pt-24 pb-10 px-4">
        <div class="max-w-md mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-md p-8">
                <!-- Logo Section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                        <i class="fas fa-user-plus text-2xl text-blue-600"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-blue-800 mb-2">Join inTel-U</h1>
                    <p class="text-gray-600">Create your academic account</p>
                </div>

                <!-- Register Form -->
                <form action="{{ route('register.post') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Full Name Field -->
                    <div>
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-user mr-2 text-gray-500"></i>Full Name
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                            placeholder="Enter your full name"
                        >
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-envelope mr-2 text-gray-500"></i>Email Address
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                            placeholder="Enter your email"
                        >
                    </div>

                    <!-- Student ID (for students only) -->
                    <div id="studentIdField" class="student-field">
                        <label for="student_id" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-id-card mr-2 text-gray-500"></i>Student ID
                        </label>
                        <input 
                            type="text" 
                            id="student_id" 
                            name="student_id" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                            placeholder="Enter your student ID"
                        >
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-lock mr-2 text-gray-500"></i>Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required
                                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Create a password"
                                onkeyup="checkPasswordStrength()"
                            >
                            <button type="button" onclick="togglePassword('password', 'passwordIcon')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <i id="passwordIcon" class="fas fa-eye"></i>
                            </button>
                        </div>
                        <!-- Password Strength Meter -->
                        <div class="mt-2">
                            <div class="w-full bg-gray-200 rounded-full h-2" id="strengthMeterContainer">
                                <div class="h-2 rounded-full transition-all duration-300" id="strengthMeter" style="width: 0%;"></div>
                            </div>
                            <p id="strengthText" class="text-xs text-gray-500 mt-1"></p>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">
                            <i class="fas fa-lock mr-2 text-gray-500"></i>Confirm Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required
                                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                placeholder="Confirm your password"
                            >
                            <button type="button" onclick="togglePassword('password_confirmation', 'confirmPasswordIcon')" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <i id="confirmPasswordIcon" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>


                    <!-- Sign Up Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        <i class="fas fa-user-plus mr-2"></i>Create Account
                    </button>
                </form>

                <!-- Divider -->
                <div class="flex items-center my-6">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="px-4 text-gray-500 text-sm">or</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Sign In Link -->
                <div class="text-center">
                    <p class="text-gray-600 text-sm">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                            Sign in here
                        </a>
                    </p>
                </div>

                <!-- Back to Home -->
                <div class="text-center mt-6">
                    <a href="{{ route('home') }}" class="text-gray-500 text-sm hover:text-gray-700 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    <div id="successMessage" class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md hidden">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            <span>Account created successfully!</span>
        </div>
    </div>

    <div id="errorMessage" class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md hidden">
        <div class="flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            <span>Please check your information and try again.</span>
        </div>
    </div>
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthMeter = document.getElementById('strengthMeter');
            const strengthText = document.getElementById('strengthText');
            
            let strength = 0;
            let feedback = '';
            
            // Check password criteria
            if (password.length >= 8) strength += 1;
            if (password.match(/[a-z]/)) strength += 1;
            if (password.match(/[A-Z]/)) strength += 1;
            if (password.match(/[0-9]/)) strength += 1;
            if (password.match(/[^a-zA-Z0-9]/)) strength += 1;
            
            // Update meter and text
            switch(strength) {
                case 0:
                case 1:
                    strengthMeter.style.width = '20%';
                    strengthMeter.style.backgroundColor = '#ef4444';
                    feedback = 'Very weak password';
                    break;
                case 2:
                    strengthMeter.style.width = '40%';
                    strengthMeter.style.backgroundColor = '#f59e0b';
                    feedback = 'Weak password';
                    break;
                case 3:
                    strengthMeter.style.width = '60%';
                    strengthMeter.style.backgroundColor = '#eab308';
                    feedback = 'Fair password';
                    break;
                case 4:
                    strengthMeter.style.width = '80%';
                    strengthMeter.style.backgroundColor = '#22c55e';
                    feedback = 'Good password';
                    break;
                case 5:
                    strengthMeter.style.width = '100%';
                    strengthMeter.style.backgroundColor = '#16a34a';
                    feedback = 'Strong password';
                    break;
            }
            
            strengthText.textContent = feedback;
        }
        // Handle user type selection
        document.addEventListener('DOMContentLoaded', function() {
            const userTypeRadios = document.querySelectorAll('input[name="user_type"]');
            const studentIdField = document.getElementById('studentIdField');
            const studentIdInput = document.getElementById('student_id');
            
            function toggleStudentFields() {
                const selectedType = document.querySelector('input[name="user_type"]:checked').value;
                
                if (selectedType === 'student') {
                    studentIdField.style.display = 'block';
                    studentIdInput.required = true;
                } else {
                    studentIdField.style.display = 'none';
                    studentIdInput.required = false;
                    studentIdInput.value = '';
                }
            }
            
            userTypeRadios.forEach(radio => {
                radio.addEventListener('change', toggleStudentFields);
            });
            
            // Initial call
            toggleStudentFields();
        });
        // Form validation feedback
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input[required]');
            
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('ring-2', 'ring-red-400', 'ring-opacity-50');
                    } else {
                        this.classList.remove('ring-2', 'ring-red-400', 'ring-opacity-50');
                    }
                });
            });
            
            // Password confirmation validation
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');
            
            confirmPassword.addEventListener('blur', function() {
                if (this.value !== password.value && this.value !== '') {
                    this.classList.add('ring-2', 'ring-red-400', 'ring-opacity-50');
                } else {
                    this.classList.remove('ring-2', 'ring-red-400', 'ring-opacity-50');
                }
            });
        });
    </script>
</body>
</html>