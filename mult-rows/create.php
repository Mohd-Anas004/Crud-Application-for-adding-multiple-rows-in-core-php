<?php include 'header.php'; ?>

<body>

    <?php if (isset($_GET['message'])) {
        echo  "<h6>" . $_GET['message'] . "</h6>";
    }

    ?>

    <h5>Enter Your Details</h5>
    <section class="form-area">

        <div class="container">
            <form action="insert.php" method="post">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group"><input class="form-control mb-4" type="text" name="name" placeholder="Enter your name"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"><input class="form-control mb-4" type="email" name="email" placeholder="Enter your email"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"><input class="form-control mb-4" type="text" name="phone" placeholder="Enter your phone"></div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"><input class="form-control mb-4" type="text" name="rollno" placeholder="Enter your roll number"></div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control mb-4" name="address" placeholder="Enter your address"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12 text-end">
                        <div class="add_book">
                            <button type="button" class="btn btn-primary add_item_button">Add</button>
                        </div>
                    </div>
                </div>
                <div id="add-booking">
                    <div class="card bg-light p-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="book[]" required placeholder="Book Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="author[]" required placeholder="Author">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="price[]" required placeholder="Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-lg-12 text-end ">
            <input type="submit" value="submit" class="btn btn-success">
        </div>
        <div class="col-lg-12 text-start ">

            <a href="index.php" class="btn  btn-secondary btn:hover">Cancel</a>
        </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add_item_button").click(function(e) {
                e.preventDefault();


                let lastCard = $("#add-booking .card").last();
                let book = lastCard.find('input[name="book[]"]').val();
                let author = lastCard.find('input[name="author[]"]').val();
                let price = lastCard.find('input[name="price[]"]').val();

                if (book === "" || author === "" || price === "") {
                    alert("Please fill in the book, author, and price fields before adding a new set.");
                } else {
                    $("#add-booking").append(`
                        <div class="card bg-light p-2 mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group"><input class="form-control" type="text" name="book[]" required placeholder="Book Name"></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group"><input class="form-control" type="text" name="author[]" required placeholder="Author"></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group"><input class="form-control" type="text" name="price[]" required placeholder="Price"></div>
                                    </div>
                                    <div class="col-lg-2 text-end">
                                        <button type="button" class="btn btn-danger remove_item_button">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                }
            });

            $(document).on('click', '.remove_item_button', function(e) {
                e.preventDefault();
                $(this).closest('.card').remove();
            });
        });
    </script>
</body>

</html>