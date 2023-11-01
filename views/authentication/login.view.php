<?php require base_path("views/templates/header.php"); ?>
<?php require base_path("views/templates/nav.php"); ?>
<main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                <div class="mb-4">
                    <div class="relative">
                        <input id="username" name="username" type="text" placeholder="Username" value="<?= old('username'); ?>" autocomplete="given name" class="block w-full py-2 border-0 rounded-md text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>
                <div class="mb-4">
                    <input id="password" name="password" type="password" placeholder="Password" autocomplete="current-password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
                <div class="mb-4">
                    <div class="error mt-3">
                        <?php
                        if (!empty($errors['authentication'])) {
                            echo '<div class="error-content" style="display: flex; align-items: center;">
                                    <div class="icon-container">
                                        <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                        </svg>
                                    </div>
                                    <div class="message-container" style="margin-left: 10px;">
                                        <strong style="color: red; font-size: small; font-family: cursive">' .
                                $errors['authentication'] . '</strong>
                                    </div>
                                </div>';
                        } else {
                            echo '';
                        }
                        ?>
                    </div>
                </div>

                <div>
                    <button type="submit" value="login" name="login" class="flex w-full justify-center rounded-md
                    bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm
                    hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                    focus-visible:outline-indigo-600">Login</button>
                </div>
            </form>


            <p class="mt-10 text-center text-sm text-gray-500">
                Can't remember your password?
                <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Reset
                    your
                    password</a>
            </p>
        </div>
    </div>
</main>
<?php require base_path("views/templates/footer.php"); ?>