<?php include APP_ROOT . '/app/views/admin/common/header.php' ?>
<?php include APP_ROOT . '/app/views/admin/common/container.php' ?>
    <section id="main">
        <div class="container">
            <div class="row">
                <?php include APP_ROOT.'/app/views/admin/common/sidebar.php' ?>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Post Listing</h3>
                        </div>
                        <div class="panel-body">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h3 class="panel-title"></h3>
                                    </div>
                                    <div class="col-md-2" align="right">
                                        <a href="compose_post.php"
                                           class="btn btn-default btn-xs">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <table id="postsList" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>

                                    <th>Created</th>
                                    <th>Updated</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($courses as $course) {
                                    $created = date_create($course->getCreated());
                                    $updated = date_create($course->getUpdated());

                                    echo '
                                               <tr>
                                                <th>' . $course->getTitle() . '</th>
                                                <th>' . $course->getDescription() . '</th>
                                           
                                                <th>' .  $created->format('Y-m-d H:i:s') . '</th>
                                                <th>' .  $updated->format('Y-m-d H:i:s') . '</th>
                                          
                                            </tr>';
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include APP_ROOT . '/app/views/admin/common/footer.php' ?>