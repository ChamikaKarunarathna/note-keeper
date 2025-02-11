<?php
if (isset($_SESSION['user_id'])) {
    header('Location: index.php?page=dashboard');
    exit;
}
?>

<div class="bg-white max-h-screen">
    <div class="relative isolate px-6 pt-14 lg:px-8 max-h-screens">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-3xl my-auto w-full h-full">
            <div class="min-h-[calc(100vh-80px)] flex flex-col items-center justify-center py-6 px-4 mx-auto">
                <div class="flex flex-row items-center justify-around gap-6 max-w-6xl w-full">
                    <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto min-w-1/2">
                        <form class="space-y-4" action="index.php?page=register" method="POST">
                            <div class="mb-8">
                                <h3 class="text-gray-800 text-3xl font-bold">Sign up</h3>
                                <p class="text-gray-500 text-sm mt-4 leading-relaxed">Register your account now and never loss a note again.</p>
                            </div>

                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Email</label>
                                <div class="relative flex items-center">
                                    <input
                                        name="user_email"
                                        type="email"
                                        required
                                        class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                                        placeholder="Enter email" />
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                        <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                        <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Password</label>
                                <div class="relative flex items-center">
                                    <input
                                        name="user_password"
                                        type="password"
                                        required
                                        class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                                        placeholder="Enter password" />
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 128 128">
                                        <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <label class="text-gray-800 text-sm mb-2 block">Confirm Password</label>
                                <div class="relative flex items-center">
                                    <input
                                        name="user_re_password"
                                        type="password"
                                        required
                                        class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                                        placeholder="Confirm password"
                                        onfocus="passwordValidator()" />
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 128 128">
                                        <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="!mt-8">
                                <button
                                    type="submit"
                                    class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full cursor-pointer">
                                    Sign up
                                </button>
                            </div>

                            <p class="text-sm !mt-8 text-center text-gray-500">Already have an account <a href="?page=login" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Sign in here</a></p>
                        </form>

                        <script>
                            const passwordValidator = () => {
                                const passwordInput = document.querySelector('input[name="user_password"]');
                                const password = passwordInput.value;

                                if (password.length < 8) {
                                    showToast('error', 'Password must be at least 8 characters long.');
                                    passwordInput.focus();
                                    event.preventDefault();
                                    return;
                                }

                                const hasUpperCase = /[A-Z]/.test(password);
                                const hasLowerCase = /[a-z]/.test(password);
                                const hasNumber = /\d/.test(password);
                                const hasSpecialChar = /[!@#$%^&*]/.test(password);

                                if (!(hasUpperCase && hasLowerCase && hasNumber && hasSpecialChar)) {
                                    showToast('error', 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.');
                                    passwordInput.focus();
                                    event.preventDefault();
                                    return;
                                }

                                // if (containsSequence(password)) {
                                //     alert('Password cannot contain simple sequences or repeated patterns like "1234", "abcd", or "1111".');
                                //     passwordInput.focus();
                                //     event.preventDefault();
                                //     return;
                                // }

                                // function containsSequence(password) {
                                //     for (let i = 0; i < password.length - 2; i++) {
                                //         const char1 = password.charCodeAt(i);
                                //         const char2 = password.charCodeAt(i + 1);
                                //         const char3 = password.charCodeAt(i + 2);

                                //         if ((char2 === char1 + 1 && char3 === char2 + 1) || (char2 === char1 - 1 && char3 === char2 - 1)) {
                                //             return true;
                                //         }

                                //         if (char1 === char2 && char2 === char3) {
                                //             return true;
                                //         }
                                //     }
                                //     return false;
                                // }
                            }
                            document.querySelector('form').addEventListener('submit', function(event) {
                                const emailInput = document.querySelector('input[name="user_email"]');
                                const passwordInput = document.querySelector('input[name="user_password"]');
                                const confirmPasswordInput = document.querySelector('input[name="user_re_password"]');

                                const email = emailInput.value.trim();
                                const password = passwordInput.value;
                                const confirmPassword = confirmPasswordInput.value;

                                if (!email || !password || !confirmPassword) {
                                    showToast('error', 'Please fill in all fields.');
                                    event.preventDefault();
                                    return;
                                }

                                passwordValidator();

                                if (password !== confirmPassword) {
                                    showToast('error', 'Passwords do not match.');
                                    confirmPasswordInput.focus();
                                    event.preventDefault();
                                }
                            });
                        </script>
                    </div>
                    <div class="hidden md:flex max-md:mt-8 w-1/2">
                        <img src="./assets/images/register.svg" class="w-full aspect-[71/50] max-md:w-4/5 mx-auto block object-cover" alt="Dining Experience" />
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl bottom-0" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</div>