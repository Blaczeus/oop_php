<?php require base_path("views/templates/header.php"); ?>
<?php require base_path("views/templates/nav.php"); ?>
<?php require base_path("views/templates/banner.php"); ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form action="/notes" method="post" class="was-validated">
            <input type="hidden" name="_method" value="POST">
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-bold leading-4 text-gray-900">Create a Note</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input value= "<?= $_POST['title'] ?? '' ?>" style="color: #043749; font-size: small; font-family: cursive;" type="text" name="title" id="title" placeholder="Heading" class="block flex-1 border-0 bg-transparent py-1.5
                      pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                            <div class="mt-2">
                                <textarea style="color: #043749; font-size: small; font-family: cursive" id="body" name="body" rows="3" placeholder="Here's an Idea for a note..." class="block w-full rounded-md border-0
                                py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['body'] ?? '' ?></textarea>
                            </div>
                            <div class="error mt-3">
                                <?php
                                if (!empty($errors)) {
                                    foreach ($errors as $error) {
                                        echo '<div class="error-content" style="display: flex; align-items: center;">
                                                <div class="icon-container">
                                                    <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-exclamation-circle-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                    </svg>
                                                </div>
                                                <div class="message-container" style="margin-left: 10px;">
                                                    <strong style="color: red; font-size: small; font-family: cursive">' . $error . '</strong>
                                                </div>
                                            </div>';
                                    }
                                } elseif (!empty($messages)) {
                                    echo '<strong style="color: #2ad90d;">' . $messages[0] . '</strong>';
                                } else {
                                    echo '';
                                }
                                ?>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button name="cancel" type="submit" class=" rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</button>
                <button name="create" type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>
    </div>
</main>

<?php require base_path("views/templates/footer.php"); ?>
