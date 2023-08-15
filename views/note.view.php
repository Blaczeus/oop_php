<?php require "templates/header.php"; ?>
<?php require "templates/nav.php"; ?>
<?php require "templates/banner.php"; ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div>
            <a href="/oop_php/notes"
               class="btn mb-6 btn-md bg-gray-900 text-gray-100 hover:text-gray-900 shadow-primary w-sm-auto">
                <i class="bx bx-arrow-back me-2 mb ms-n1"></i>
                Go Back
            </a>
        </div>

        <h1 class="text-black-500 text-lg font-medium underline">
            <?php echo $note['title'] ?>
        </h1>

        <p class="text-gray-500 text-sm-start font-medium">
            <?= $note['body']; ?>
        </p>
    </div>
</main>
<?php require "templates/footer.php"; ?>
