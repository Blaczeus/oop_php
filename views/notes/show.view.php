<?php require base_path("views/templates/header.php"); ?>
<?php require base_path("views/templates/nav.php"); ?>
<?php require base_path("views/templates/banner.php"); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1 class="text-black-500 text-lg font-medium underline">
            <?= ($note['title']) ?>
        </h1>

        <p class="text-gray-500 text-sm-start font-medium">
            <?=($note['body']); ?>
        </p>
        <form action="/note" method = 'POST'>
            <input type="hidden" name="id" class="text" value="<?= $note['id'] ?>" readonly>
            <input type="hidden" name="_method" class="text" value="DELETE" readonly>
            <div class="flex space-x-[1000px]">
                <div class="mt-8 items-center justify-end gap-x-6">
                    <button name="back" type="button" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold
                        text-white shadow-sm hover:bg-gray-900 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <i class="bx bx-arrow-back me-2 mb ms-n1"></i>
                        <a href="/notes" class="button">Go Back</a>
                    </button>
                </div>
                <div class="mt-8 items-center justify-end gap-x-6">
                    <button name="edit" type="button" class="rounded-md bg-blue-700 px-3 py-2 text-sm font-semibold
                                                       text-white shadow-sm hover:bg-blue-900 focus-visible:outline focus-visible:outline-2
                                                       focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <i class="bx bx-edit me-2 mb ms-n1"></i>
                        <a href="/note/edit?id=<?= $note['id']?>" class="button">Edit note</a>
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require base_path("views/templates/footer.php"); ?>
