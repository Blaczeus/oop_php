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

    .note-card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        padding: 16px;
        margin: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .note-title {
        color: #0070f3;
        font-size: 18px;
        font-weight: bold;
        margin-right: auto; /* Pushes the date to the far end */
    }

    .note-date {
        color: #666;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .note-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .note-title {
            margin-bottom: 8px; /* Adds space between title and date */
        }
    }
</style>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <a href="/note?id=<?= $note['id'] ?>" class="note-title">
                <div class="note-card">
                    <?php echo htmlspecialchars($note['title']) ?>
                    <p class="note-date"><?php echo formatRelativeTime($note['created_at']); ?></p>
                </div>
            </a>
        <?php endforeach; ?>

        <div class="mt-5">
            <p id="create-btn">
                <a href="notes/create" class="button">Create Note</a>
            </p>
        </div>
    </div>
</main>
<?php require base_path("views/templates/footer.php"); ?>
