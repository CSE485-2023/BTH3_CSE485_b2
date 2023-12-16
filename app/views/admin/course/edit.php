<?php include APP_ROOT . '/app/views/admin/common/header.php' ?>
<?php include APP_ROOT . '/app/views/admin/common/container.php' ?>
    <main class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">
                <?php echo $_GET['action'] === 'create' ? 'Add new Course' : 'Edit course'; ?>
            </h3>
            <form action="index.php?c=course&a=create" method="post">
                <?php if (isset($_GET['id']) && isset($course)) {
                    echo '
                 <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Course id</span>
                    <input type="text" class="form-control" name="txtId" readonly value="' . $course->getId() . '">
                </div>
                ';
                }
                ?>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblUName">Title</span>
                    <input type="text" class="form-control" name="txtTitle" value="<?php echo isset($course) ? $course->getTitle() : ""; ?>">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblUPass">Description</span>
                    <input type="text" class="form-control" name="txtDescription" value="<?php echo isset($course) ? $course->getDescription() : ""; ?>">
                </div>


                <div class="form-group float-end">
                    <input type="submit" value="Save" class="btn btn-success">
                    <a href="" class="btn btn-warning">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include APP_ROOT . '/app/views/admin/common/footer.php' ?>