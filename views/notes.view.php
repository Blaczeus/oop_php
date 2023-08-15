<?php require "templates/header.php"; ?>
<?php require "templates/nav.php"; ?>
<?php require "templates/banner.php"; ?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/oop_php/note?id=<?= $note['id'] ?>" class="text-blue-500 text-md font-medium hover:underline">
                    <?php echo $note['title'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </div>
</main>
<?php require "templates/footer.php"; ?>
