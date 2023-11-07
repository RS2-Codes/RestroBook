<footer>
    <div class="container">
        <div class="">
            <a href="#">RestroBook</a>
        </div>
        <ul class="list-unstyled d-flex gap-2 flex-wrap my-2">
            <li>
                <a aria-current="page" href="index.php">Home</a>
            </li>
            <?php if ($login == 1) { ?>
                <li class="nav-item">
                    <a href="booked.php">Booked</a>
                </li>
            <?php } ?>
            <li>
                <a href="https://github.com/rhvsingh/RestroBook">Repo</a>
            </li>
        </ul>
    </div>
</footer>
<!-- Footer -->

<?php include_once('login_form.php'); ?>