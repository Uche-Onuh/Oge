<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Month Total</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0">Month</label>
                                <input type="text" name="month" class="form-control mb-2" placeholder="Enter Month" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Amount</label>
                                <input type="number" name="amount" class="form-control mb-2" placeholder="Enter Sales Total" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Year</label>
                                <input type="number" name="year" class="form-control mb-2" placeholder="Enter Year" required>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-info" name="add_sales_btn" type="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>