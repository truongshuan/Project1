                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Add new Vouchers</h5>
                                </div>
                                <div class="card-body">
                                    <form class="theme-form mega-form" method="POST" action="index.php"
                                        enctype="multipart/form-data">
                                        <?php
                                        if (isset($_SESSION['error_date_voucher'])) {
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $_SESSION['error_date_voucher']; ?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="mb-3">
                                            <label class="col-form-label">Name Voucher</label>
                                            <input name="ten_km" class="form-control" type="text"
                                                placeholder="Enter Name Voucher" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Code</label>
                                            <input name="code" class="form-control" type="text" placeholder="Enter Code"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Date Start</label>
                                            <input name="ngay_bat_dau" class="form-control" type="date"
                                                placeholder="Date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Date End</label>
                                            <input name="ngay_ket_thuc" class="form-control" type="date"
                                                placeholder="Date" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Description</label>
                                            <textarea name="mo_ta" class="form-control" type="text"
                                                placeholder="Enter desc" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" name="add_voucher">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['error_date_voucher'])) {
                            unset($_SESSION['error_date_voucher']);
                        }
                        ?>