<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>All Reviews</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="all_reviews.php">All Reviews</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            require_once('connect.php');
                            $query = "SELECT * FROM reviews ORDER BY id DESC";
                            $result = $conn->query($query);
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Reviews</h5>
                                </div>
                                <div class="card-block">
                                    <?php if ($result->num_rows > 0): ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Review</th>
                                                        <th>Rating</th>
                                                        <th>User</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($row = $result->fetch_assoc()): ?>
                                                        <tr>
                                                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                            <td><?php echo htmlspecialchars($row['review']); ?></td>
                                                            <td>
                                                                <div class="star-rating">
                                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                                        <?php if($i <= $row['rating']): ?>
                                                                            <i class="fas fa-star checked"></i>
                                                                        <?php else: ?>
                                                                            <i class="far fa-star"></i>
                                                                        <?php endif; ?>
                                                                    <?php endfor; ?>
                                                                </div>
                                                            </td>
                                                            <td><?php echo htmlspecialchars($row['user_id']); ?></td>

                                                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-info">No reviews found.</div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include('footer.php'); ?>
            </div>
        </div>
    </div>
</div>

<style>
    .star-rating .fa-star.checked {
        color: #ffc107;
    }
</style>
