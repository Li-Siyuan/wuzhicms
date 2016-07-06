<?php defined('IN_WZ') or exit('No direct script access allowed'); ?><?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","head"); ?>
<body class="gray-bg">
<?php if($set_iframe==0) { ?>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","iframetop"); ?>
<?php } else { ?>
<div style="padding-top: 15px;"></div>
<?php } ?>
<div class="container-fluid  ie8-member">
    <div  class="row row-40">
        <?php if($set_iframe==0) { ?>
        <div class="col-sm-3 left-nav">             <!--左侧导航-->
            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="nav-close"><i class="fa fa-times-circle"></i>
                </div>
                <div class="slimScrollDiv" style="position: relative; width: auto; height: 100%;">
                    <div class="sidebar-collapse" style="width: auto; height: 100%;">
                        <?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","left"); ?>
                    </div>
                </div>
            </nav>
            <!--end 左侧导航-->
        </div><!--col-sm-3--><?php } ?>

        <div class="<?php if($set_iframe==0) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?> paddingleft0">

            <div class="row">
                <div class="col-sm-12">
                    <div class="ibox">
                        <section class="panel">
                            <header class="panel-heading"><span class="title">我的订单</span></header>

                            <ul id="myTab" class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tabs1" id="1tab" role="tab" data-toggle="tab" aria-controls="tabs1" aria-expanded="true">全部订单</a></li>
                                <li role="presentation" class=""><a href="#tabs2" role="tab" id="2tab" data-toggle="tab" aria-controls="tabs2" aria-expanded="false">已付款</a></li>
                                <li role="presentation" class=""><a href="#tabs3" role="tab" id="3tab" data-toggle="tab" aria-controls="tabs3" aria-expanded="false">待付款</a></li>
                                <li role="presentation" class=""><a href="#tabs4" role="tab" id="4tab" data-toggle="tab" aria-controls="tabs4" aria-expanded="false">已取消订单</a></li>
                                <?php if($memberinfo['modelid']==11) { ?>
                                <li role="presentation" style="float: right;background-color: #E2E2E2;" onclick="get_cardid()"><a href="#tabs4">重新获取预约卡信息</a></li><?php } ?>
                            </ul>
                            </li>
                            </ul>

                            <div id="myTabContent" class="tab-content tabsbordertop">

                                <div role="tabpanel" class="tab-pane fade active in" id="tabs1" aria-labelledby="1tab">
                                    <div class="panel-body" id="panel-bodys">
                                        <table class="table table-striped table-advance table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th class="tablehead">订单信息</th>
                                                <th class="tablehead">数量</th>
                                                <th class="tablehead">下单时间</th>
                                                <th class="tablehead">支付方式</th>
                                                <th class="tablehead">状态</th>
                                                <th class="tablehead">金额（总价）</th>
                                                <th class="tablehead">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $n=1;if(is_array($result)) foreach($result AS $r) { ?>
                                            <tr>
                                                <td colspan="7" class="text-left ordernumber">订单号：<?php echo $r['order_no'];?> <?php if($r['cardtype']==1) { ?>(<font color="green">实物卡</font>)<?php } ?> <?php if($r['snid']) { ?> <?php echo $r['express'];?>单号：<?php echo $r['snid'];?><?php } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="orderlist" style="max-width: 300px;">
                                                    <?php $n=1;if(is_array($r['goodlist'])) foreach($r['goodlist'] AS $goodlist) { ?>
                                                    <a href="<?php echo $goodlist['url'];?>"><div class="orderproimg"><img src="<?php echo $goodlist['thumb'];?>" title="<?php echo $goodlist['remark'];?>"><span><?php echo strcut($goodlist['remark'],20);?></span></div></a>
                                                    <?php $n++;}?>
                                                </td>
                                                <td class="orderlist"><?php echo $r['quantity'];?></td>
                                                <td class="orderlist"><?php echo date('Y-m-d H:i',$r['addtime']);?></td>
                                                <td class="orderlist"><i class="onlinepay"></i>在线付款</td>
                                                <td class="orderlist"><?php if($r['status']==2) { ?><i class="nopayment"></i>未付款<?php } elseif ($r['status']==3) { ?>已取消<?php } elseif ($r['status']==1 || $r['status']==5) { ?><i class="paymenticon"></i>已付款<?php } elseif ($r['status']==6) { ?><i class="paymenticon"></i>已发货<?php } ?></td>
                                                <td class="orderlist">￥<?php echo $r['money'];?></td>
                                                <td><?php if($r['status']==2) { ?><a href="?m=order&f=order_goods&v=repay&order_no=<?php echo $r['order_no'];?>" class="btn btn-orderpay" target="_blank">马上付款</a> <br><br> <a href="?m=order&f=order_goods&v=cancel&order_no=<?php echo $r['order_no'];?>">取消订单</a><?php } elseif ($r['status']==5 && $r['comment']==0) { ?><a href="#" class="btn btn-order">立即点评</a><?php } ?></td>
                                            </tr>
                                            <?php $n++;}?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="paginationpage text-center">
                                        <nav>
                                            <ul class="pagination">
                                                <?php echo $pages;?>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>


                                <div role="tabpanel" class="tab-pane fade" id="tabs2" aria-labelledby="2tab">
                                    <div class="panel-body" id="panel-bodys">
                                        <table class="table table-striped table-advance table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th class="tablehead">订单信息</th>
                                                <th class="tablehead">数量</th>
                                                <th class="tablehead">下单时间</th>
                                                <th class="tablehead">支付方式</th>
                                                <th class="tablehead">状态</th>
                                                <th class="tablehead">金额（总价）</th>
                                                <th class="tablehead">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $n=1;if(is_array($result2)) foreach($result2 AS $r) { ?>
                                            <tr>
                                                <td colspan="7" class="text-left ordernumber">订单号：<?php echo $r['order_no'];?> <?php if(count_field($result,$r['order_no'])>1) { ?>(包含子订单)<?php } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="orderlist" style="max-width: 300px;">
                                                    <?php $n=1;if(is_array($r['goodlist'])) foreach($r['goodlist'] AS $goodlist) { ?>
                                                    <a href="<?php echo $goodlist['url'];?>"><div class="orderproimg"><img src="<?php echo $goodlist['thumb'];?>" title="<?php echo $goodlist['remark'];?>"><span><?php echo strcut($goodlist['remark'],20);?></span></div></a>
                                                    <?php $n++;}?>
                                                </td>
                                                <td class="orderlist"><?php echo $r['quantity'];?></td>
                                                <td class="orderlist"><?php echo date('Y-m-d H:i',$r['addtime']);?></td>
                                                <td class="orderlist"><i class="onlinepay"></i>在线付款</td>
                                                <td class="orderlist"><?php if($r['status']==2) { ?><i class="nopayment"></i>未付款<?php } elseif ($r['status']==3) { ?>已取消<?php } elseif ($r['status']==1 || $r['status']==5) { ?><i class="paymenticon"></i>已付款<?php } ?></td>
                                                <td class="orderlist">￥<?php echo $r['money'];?></td>
                                                <td><?php if($r['status']==2) { ?><a href="?m=order&f=order_goods&v=repay&order_no=<?php echo $r['order_no'];?>" class="btn btn-orderpay" target="_blank">马上付款</a> <br><br> <a href="?m=order&f=order_goods&v=cancel&order_no=<?php echo $r['order_no'];?>">取消订单</a><?php } elseif ($r['status']==5 && $r['comment']==0) { ?><a href="#" class="btn btn-order">立即点评</a><?php } ?></td>
                                            </tr>
                                            <?php $n++;}?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tabs3" aria-labelledby="3tab">
                                    <div class="panel-body" id="panel-bodys">
                                        <table class="table table-striped table-advance table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th class="tablehead">订单信息</th>
                                                <th class="tablehead">数量</th>
                                                <th class="tablehead">下单时间</th>
                                                <th class="tablehead">支付方式</th>
                                                <th class="tablehead">状态</th>
                                                <th class="tablehead">金额（总价）</th>
                                                <th class="tablehead">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $n=1;if(is_array($result3)) foreach($result3 AS $r) { ?>
                                            <tr>
                                                <td colspan="7" class="text-left ordernumber">订单号：<?php echo $r['order_no'];?> <?php if(count_field($result,$r['order_no'])>1) { ?>(包含子订单)<?php } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="orderlist" style="max-width: 300px;">
                                                    <?php $n=1;if(is_array($r['goodlist'])) foreach($r['goodlist'] AS $goodlist) { ?>
                                                    <a href="<?php echo $goodlist['url'];?>"><div class="orderproimg"><img src="<?php echo $goodlist['thumb'];?>" title="<?php echo $goodlist['remark'];?>"><span><?php echo strcut($goodlist['remark'],20);?></span></div></a>
                                                    <?php $n++;}?>
                                                </td>
                                                <td class="orderlist"><?php echo $r['quantity'];?></td>
                                                <td class="orderlist"><?php echo date('Y-m-d H:i',$r['addtime']);?></td>
                                                <td class="orderlist"><i class="onlinepay"></i>在线付款</td>
                                                <td class="orderlist"><?php if($r['status']==2) { ?><i class="nopayment"></i>未付款<?php } elseif ($r['status']==3) { ?>已取消<?php } elseif ($r['status']==1 || $r['status']==5) { ?><i class="paymenticon"></i>已付款<?php } ?></td>
                                                <td class="orderlist">￥<?php echo $r['money'];?></td>
                                                <td><?php if($r['status']==2) { ?><a href="?m=order&f=order_goods&v=repay&order_no=<?php echo $r['order_no'];?>" class="btn btn-orderpay" target="_blank">马上付款</a> <br><br> <a href="?m=order&f=order_goods&v=cancel&order_no=<?php echo $r['order_no'];?>">取消订单</a><?php } elseif ($r['status']==5 && $r['comment']==0) { ?><a href="#" class="btn btn-order">立即点评</a><?php } ?></td>
                                            </tr>
                                            <?php $n++;}?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tabs4" aria-labelledby="4tab">
                                    <div class="panel-body" id="panel-bodys">
                                        <table class="table table-striped table-advance table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th class="tablehead">订单信息</th>
                                                <th class="tablehead">数量</th>
                                                <th class="tablehead">下单时间</th>
                                                <th class="tablehead">支付方式</th>
                                                <th class="tablehead">状态</th>
                                                <th class="tablehead">金额（总价）</th>
                                                <th class="tablehead">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $n=1;if(is_array($result4)) foreach($result4 AS $r) { ?>
                                            <tr>
                                                <td colspan="7" class="text-left ordernumber">订单号：<?php echo $r['order_no'];?> <?php if(count_field($result,$r['order_no'])>1) { ?>(包含子订单)<?php } ?></td>
                                            </tr>
                                            <tr>
                                                <td class="orderlist" style="max-width: 300px;">
                                                    <?php $n=1;if(is_array($r['goodlist'])) foreach($r['goodlist'] AS $goodlist) { ?>
                                                    <a href="<?php echo $goodlist['url'];?>"><div class="orderproimg"><img src="<?php echo $goodlist['thumb'];?>" title="<?php echo $goodlist['remark'];?>"><span><?php echo strcut($goodlist['remark'],20);?></span></div></a>
                                                    <?php $n++;}?>
                                                </td>
                                                <td class="orderlist"><?php echo $r['quantity'];?></td>
                                                <td class="orderlist"><?php echo date('Y-m-d H:i',$r['addtime']);?></td>
                                                <td class="orderlist"><i class="onlinepay"></i>在线付款</td>
                                                <td class="orderlist"><?php if($r['status']==2) { ?><i class="nopayment"></i>未付款<?php } elseif ($r['status']==3) { ?>已取消<?php } elseif ($r['status']==1 || $r['status']==5) { ?><i class="paymenticon"></i>已付款<?php } ?></td>
                                                <td class="orderlist">￥<?php echo $r['money'];?></td>
                                                <td><?php if($r['status']==2) { ?><a href="?m=order&f=order_goods&v=repay&order_no=<?php echo $r['order_no'];?>" class="btn btn-orderpay" target="_blank">马上付款</a> <br><br> <a href="?m=order&f=order_goods&v=cancel&order_no=<?php echo $r['order_no'];?>">取消订单</a><?php } elseif ($r['status']==5 && $r['comment']==0) { ?><a href="#" class="btn btn-order">立即点评</a><?php } ?></td>
                                            </tr>
                                            <?php $n++;}?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>


                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo R;?>member/js/jscarousel.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#jsCarousel').jsCarousel({ onthumbnailclick: function(src) {
            // 可在这里加入点击图片之后触发的效果
            $("#overlay_pic").attr('src', src);
            $(".overlay").show();
        }, autoscroll: true });

        $(".overlay").click(function(){
            $(this).hide();
        });
    });
</script>

<script >
    <?php if($status==1) { ?>$("#2tab").click();<?php } ?>
</script>
<!--正文部分-->
<script type="text/javascript">
    var ck=0;
    function get_cardid() {
        if(ck==1) {
            var xb = dialog({
                content: '请不要连续点击！'
            });
            xb.show();
            setTimeout(function () {
                xb.close().remove();
            }, 3000);
            return false;
        }
        ck = 1;
        $.post("?m=order&f=json&v=get_cardid", { time:Math.random()},
                function(data){
                    if(data=='1') {
                        var xb = dialog({
                            content: '预约卡信息已发送到您的邮箱！'
                        });
                    } else {
                        var xb = dialog({
                            content: '请先购买套餐！'
                        });
                    }
                    xb.show();
                    setTimeout(function () {
                        xb.close().remove();
                    }, 3000);
                });

    }
</script>
<?php if(!isset($siteconfigs)) $siteconfigs=get_cache('siteconfigs'); include T("member","foot"); ?>
