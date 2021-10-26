<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <?php echo $__env->make('backend.content-header', ['name' => ' Liệt kê  ', 'key' => 'bình luận'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-agile-info">
            <div class="panel panel-default">

                <div id="notify_comment"></div>
                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light" id="myTable">
                        <thead>
                        <tr>

                            <th>Duyệt</th>
                            <th>Tên người gửi</th>
                            <th>Bình luận</th>
                            <th>Ngày gửi</th>
                            <th>Sản phẩm</th>
                            <th>Quản lý</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>

                                <td>
                                    <?php if($comm->comment_status==1): ?>
                                        <input type="button" data-comment_status="0"
                                               data-comment_id="<?php echo e($comm->comment_id); ?>"
                                               id="<?php echo e($comm->comment_product_id); ?>"
                                               class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt">
                                    <?php else: ?>
                                        <input type="button" data-comment_status="1"
                                               data-comment_id="<?php echo e($comm->comment_id); ?>"
                                               id="<?php echo e($comm->comment_product_id); ?>"
                                               class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt">
                                    <?php endif; ?>

                                </td>
                                <td><?php echo e($comm->comment_name); ?></td>

                                <td><?php echo e($comm->comment); ?>

                                    <style type="text/css">
                                        ul.list_rep li {
                                            list-style-type: decimal;
                                            color: blue;
                                            margin: 5px 40px;
                                        }
                                    </style>
                                    <ul class="list_rep">
                                        Trả lời :
                                        <?php $__currentLoopData = $comment_rep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comm_reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($comm_reply->comment_parent_comment==$comm->comment_id): ?>
                                                <li> <?php echo e($comm_reply->comment); ?></li>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                    <?php if($comm->comment_status==0): ?>
                                        <br/><textarea class="form-control reply_comment_<?php echo e($comm->comment_id); ?>"
                                                       rows="5"></textarea>
                                        <br/>
                                        <button class="btn btn-default btn-xs btn-reply-comment"
                                                data-product_id="<?php echo e($comm->comment_product_id); ?>"
                                                data-comment_id="<?php echo e($comm->comment_id); ?>">Trả lời bình luận
                                        </button>

                                    <?php endif; ?>


                                </td>
                                <td><?php echo e($comm->comment_date); ?></td>
                                <td><a href="<?php echo e(route('products-detail-view',['product_id'=>$comm->product_id])); ?>"
                                       target="_blank"><?php echo e($comm->product_name); ?></a></td>

                                <td>
                                    <a href="" class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa bình luận này ko?')" href=""
                                       class="active styling-edit" ui-toggle-class="">
                                        <i class="fa fa-times text-danger text"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/comment/list_comment.blade.php ENDPATH**/ ?>