<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<!-- FontAwesome for star icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Write a Review</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="review_form.php">Write a Review</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-info">
                                    <?php 
                                        echo $_SESSION['message']; 
                                        unset($_SESSION['message']); 
                                    ?>
                                </div>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-block">
                                    <form id="reviewForm" method="post" action="submit_review.php">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Review Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title" placeholder="Enter review title" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Review</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="review" rows="5" placeholder="Enter your review" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Rating</label>
                                            <div class="col-sm-10">
                                                <div class="star-rating">
                                                    <input type="hidden" name="rating" id="rating" value="0">
                                                    <i class="far fa-star" data-value="1"></i>
                                                    <i class="far fa-star" data-value="2"></i>
                                                    <i class="far fa-star" data-value="3"></i>
                                                    <i class="far fa-star" data-value="4"></i>
                                                    <i class="far fa-star" data-value="5"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary m-b-0">Submit Review</button>
                                            </div>
                                        </div>
                                    </form>
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
    .star-rating {
        font-size: 2em;
        color: #ddd;
        cursor: pointer;
    }
    .star-rating .fa-star.checked {
        color: #ffc107;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating .fa-star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;

                stars.forEach(star => {
                    star.classList.remove('checked');
                });

                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('checked');
                }
            });
        });
    });
</script>
