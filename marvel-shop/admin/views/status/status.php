
<!-- START Main-Content -->

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_review; ?></div>
                        <div>Lượt đánh giá</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_user; ?></div>
                        <div>Thành viên</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo  $count_order; ?></div>
                        <div>Tổng đơn hàng</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_pro; ?></div>
                        <div>Tổng số sản phẩm</div>
                    </div>
                </div>
            </div>
            <a href="index.php?page=home&views=product">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>Thống kê doanh thu <br> (Theo ngày tháng)</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bar-chart fa-5x" aria-hidden="true"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div>Thống kê doanh thu <br> (Theo sản phẩm)</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <h4 style="color: #1CE9F1">Danh sách đơn hàng mới <span style="color: red">(Có: <?php echo  $count_new; ?> đơn hàng mới)</span></h4>
            <table class="table table-inverse" border="1">
                <thead>
                    <tr>
                        <th>ID đơn hàng</th>
                        <th>Tên người đặt hàng</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($new_order as $key => $value) {

                        ?>
                        <tr class="success">
                            <td><?php echo $value['id_order']; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['address']; ?></td>
                            <td><a href="index.php?page=home&views=order" class="setSS_order" id_order="<?php echo $value['id_order']; ?>"><button type="button" class="btn btn-success">Xem chi tiết</button></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="col-md-12 col-md-push-2">
            <ul class="pagination">
                <?php 
                if (isset($_GET['pages']) && $_GET['pages'] > 1) {
                    $back = $_GET['pages'] - 1;

                    ?>
                    <li><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $back; ?>">Back</a></li>
                    <?php 
                }   
                ?>
                <?php
                for($i = 1; $i <= $pagination; $i++){
                    if ($i > $current - 3 && $i < $current + 3) {
                    ?>
                    <li <?php if($i==$_GET['pages']){echo 'class="active"';} ?> ><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php 
                }
            }
                ?>
                <?php 
                if (isset($_GET['pages']) && $_GET['pages'] < $pagination) {
                    $next = $_GET['pages'] + 1; 
                    ?>
                    <li><a href="index.php?page=home&views=<?php echo $views; ?>&pages=<?php echo $next; ?>">Next</a></li>
                    <?php 
                }   
                ?>
            </ul>

        </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <form action="" method="POST" role="form">
                <legend>Hiển thị đơn hàng đã thanh toán theo ngày</legend>
            
                <div class="form-group">
                    <label for="">Ngày bắt đầu</label>
                    <input type="datetime-local" name="start" class="form-control" id="" placeholder="Input field">
                    <span>
                        <label for="">Ngày kết thúc</label>
                        <input type="date" name="end" class="form-control" id="" placeholder="Input field">
                    </span>
                </div>
      
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
            <?php if (!isset($_POST['submit'])) {
                
            ?>
                <h4 style="color: red">Nhập ngày tháng để tìm kiếm</h4>
            <?php 
            }else{

            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Có <?php echo $count; ?></strong> đơn hàng trong khoảng thời gian này
            </div>
            <table class="table table-hover" border="1px">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>ngày tháng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($get_order_done as $key => $value) {
                        
                    ?>
                    <tr>
                        <td><?php echo $value['id_order']; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['last_update']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php 
            }
            ?>

        </div>
    </div>
</div>


