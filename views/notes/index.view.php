<?php require base_path("views/templates/header.php"); ?>
<?php require base_path("views/templates/nav.php"); ?>
<?php require base_path("views/templates/banner.php"); ?>
<style>
        .button {
            display: inline-block;
            background-color: rgba(1, 22, 39, 0.87);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .button:hover {
            background-color: #01111d;
            color: #ffffff;
        }
    </style>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 text-md font-medium hover:underline">
                    <?php echo htmlspecialchars($note['title']) ?>
                </a>
            </li>
        <?php endforeach; ?>

        <div class="mt-5">
            <p id="create-btn">
                <a href="notes/create" class="button">Create Note</a>
            </p>
        </div>
    </div>
</main>
<?php require base_path("views/templates/footer.php"); ?>
