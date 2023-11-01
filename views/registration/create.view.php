<?php require base_path("views/templates/header.php"); ?>
<?php require base_path("views/templates/nav.php"); ?>
<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/register" method="POST">
                <div class="flex space-x-4 mb-4">
                    <div class="w-1/2">
                        <input id="fname" name="fname" type="text" placeholder="First Name" autocomplete="given-name" value="<?= $_POST['fname'] ?? '' ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        <div class="error mt-3">
                            <?php
                            if (!empty($errors['fname'])) {
                                echo '<div class="error-content" style="display: flex; align-items: center;">
                                    <div class="icon-container">
                                        <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                    </div>
                                    <div class="message-container" style="margin-left: 10px;">
                                        <strong style="color: red; font-size: small; font-family: cursive">' . $errors['fname'] . '</strong>
                                    </div>
                                </div>';
                            } else {
                                echo '';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <input id="lname" name="lname" type="text" placeholder="Last Name" autocomplete="family-name" value="<?= $_POST['lname'] ?? '' ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        <div class="error mt-3">
                            <?php
                            if (!empty($errors['lname'])) {
                                echo '<div class="error-content" style="display: flex; align-items: center;">
                                    <div class="icon-container">
                                        <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                    </div>
                                    <div class="message-container" style="margin-left: 10px;">
                                        <strong style="color: red; font-size: small; font-family: cursive">' . $errors['lname'] . '</strong>
                                    </div>
                                </div>';
                            } else {
                                echo '';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-800" id="email-prefix">@</span>
                        </div>
                        <input id="username" name="username" type="text" placeholder="Username" value="<?= $_POST['username'] ?? '' ?>" autocomplete="given name" class="block w-full pl-10 pr-3 py-2 border-0 rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        <div class="error mt-3">
                            <?php
                            if (!empty($errors['username'])) {
                                echo '<div class="error-content" style="display: flex; align-items: center;">
                                    <div class="icon-container">
                                        <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                    </div>
                                    <div class="message-container" style="margin-left: 10px;">
                                        <strong style="color: red; font-size: small; font-family: cursive">' . $errors['username'] . '</strong>
                                    </div>
                                </div>';
                            } else {
                                echo '';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <input id="email" name="email" type="email" placeholder="Email address" autocomplete="email" value="<?= $_POST['email'] ?? '' ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    <div class="error mt-3">
                        <?php
                        if (!empty($errors['email'])) {
                            echo '<div class="error-content" style="display: flex; align-items: center;">
                                    <div class="icon-container">
                                        <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                    </div>
                                    <div class="message-container" style="margin-left: 10px;">
                                        <strong style="color: red; font-size: small; font-family: cursive">' . $errors['email'] . '</strong>
                                    </div>
                                </div>';
                        } else {
                            echo '';
                        }
                        ?>
                    </div>
                </div>

                <div class="mb-4">
                    <input id="password" name="password" type="password" placeholder="Password" autocomplete="current-password" value="<?= $_POST['password'] ?? '' ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    <div class="error mt-3">
                        <?php
                        if (!empty($errors['password'])) {
                            echo '<div class="error-content" style="display: flex; align-items: center;">
                                    <div class="icon-container">
                                        <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                    </div>
                                    <div class="message-container" style="margin-left: 10px;">
                                        <strong style="color: red; font-size: small; font-family: cursive">' . $errors['password'] . '</strong>
                                    </div>
                                </div>';
                        } else {
                            echo '';
                        }
                        ?>
                    </div>
                </div>

                <div>
                    <button type="submit" value="register" name="register" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                </div>
            </form>


            <p class="mt-10 text-center text-sm text-gray-500">
                Already a member?
                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign in to your account</a>
            </p>
        </div>
    </div>
</main>
<?php require base_path("views/templates/footer.php"); ?>