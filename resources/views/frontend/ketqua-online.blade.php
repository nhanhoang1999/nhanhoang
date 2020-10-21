@extends('frontend.master')
@section('view')
<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>

            <div class="row">
                <p></p>
            </div>
        </div>
    </div>    
    <div class="container" style="text-align: center;">
            <div class="header clearfix">
                <h3 class="text-muted">Kết quả giao dịch</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">
                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount'] ?></label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                            @if ($_GET['vnp_ResponseCode'] == '00') 
                               <?php echo "GD Thanh cong"?>
                             @else 
                                <?php echo "GD Khong thanh cong" ?>
                        @endif
                    </label>
                </div> 
            </div>
        </div> 
    @stop