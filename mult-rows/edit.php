<?php include 'header.php';
include 'conn.php'; ?>

<body>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM student_details WHERE id = '$id' ";
    $result1 = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = "SELECT * FROM book WHERE s_id = '$id' ";
    $result2 = mysqli_query($conn, $sql2);
    ?>

    <h5>Enter Your Details</h5>
    <section class="form-area">
        <div class="container">
            <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group"> Name<input class="form-control mb-4" value="<?= $row1['name']; ?>" type="text" name="name" placeholder="Enter your name"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">Email<input class="form-control mb-4" value="<?= $row1['email']; ?>" type="email" name="email" placeholder="Enter your email"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">Phone<input class="form-control mb-4" value="<?= $row1['phone']; ?>" type="text" name="phone" placeholder="Enter your phone"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">Roll No<input class="form-control mb-4" value="<?= $row1['rollno']; ?>" type="text" name="rollno" placeholder="Enter your roll number"></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            Address<textarea class="form-control mb-4" name="address" placeholder="Enter your address"><?= $row1['address']; ?></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 text-end">
                        <button type="button" class="btn btn-primary add_item_button">Add Book</button>
                    </div>
                </div>
                <div id="add-booking">
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                        <div class="card bg-light p-2">
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="book_id[]" value="<?= $row2['s_id']; ?>">
                                    <div class="col-lg-4">
                                        <div class="form-group">Book<input class="form-control" value="<?= $row2['book']; ?>" type="text" name="book[]" placeholder="Book Name"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">Author<input class="form-control" value="<?= $row2['author']; ?>" type="text" name="author[]" placeholder="Author"></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">Price<input class="form-control" value="<?= $row2['price']; ?>" type="text" name="price[]" placeholder="Price"></div>
                                    </div>
                                    <div class="col-lg-2 text-end">
                                        <button type="button" class="btn btn-danger remove_item_button" data-id="<?= $row2['s_id']; ?>">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-12 text-end">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
                <div class="col-lg-12 text-start">
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add_item_button").click(function(e) {
                e.preventDefault();
                $("#add-booking").append(`
                    <div class="card bg-light p-2 mt-3">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="book_id[]" value="">
                                <div class="col-lg-4">
                                    <div class="form-group"><input class="form-control" type="text" name="book[]" placeholder="Book Name"></div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group"><input class="form-control" type="text" name="author[]" placeholder="Author"></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><input class="form-control" type="text" name="price[]" placeholder="Price"></div>
                                </div>
                                <div class="col-lg-2 text-end">
                                    <button type="button" class="btn btn-danger remove_item_button">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });

            $(document).on('click', '.remove_item_button', function(e) {
                e.preventDefault();

                const card = $(this).closest('.card');


                card.remove();


            });
        });
    </script>
</body>

</html>