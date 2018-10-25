@extends('layouts.shared')


@section('content')

<div class="col-12 col-md-12 mb-4 mb-md-0">
                                <div class="card redial-border-light redial-shadow">
                                    <div class="card-body">
                                        
                                    
 <div class='alert alert-danger alert-error' style='display:none'></div>
                                        <form id="supplier_form" data-toggle="validator" method="POST"
                                              action="{{ url('dashboard/supplier/web_update_payment/'.$supplier->supplier_id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                              
                                                <div class="form row">
                                                    
                                                    <div class="col-md-12">
                                                        <label style="margin-right:25px" class="radio-inline"><input type="radio" name="payment_type" <?= ($supplier->payment_type == 'cash') ? "checked" : "" ?> value='cash' />Cash</label>
                                                        <label class="radio-inline"><input type="radio" name="payment_type" <?= ($supplier->payment_type == 'credit') ? "checked" : "" ?> value='credit' >Credit</label>
                                                    </div>
                                                    <div class="credit_method" style="<?= ($supplier->payment_type == 'credit') ? "" : "display:none" ?>">
                                                        <div class="col-md-6">
                                                            <label class="redial-font-weight-800 redial-dark">Credit Limit</label>
                                                            <input type="text" name="credit_limit" value="{{$supplier->credit_limit}}" class="form-control bg-transparent" placeholder="" />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="redial-font-weight-800 redial-dark">Credit Period</label>
                                                            <input type="text" name="credit_period" value="{{$supplier->credit_period}}"  class="form-control bg-transparent" placeholder="" />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="redial-font-weight-800 redial-dark">Payment Due Date</label>
                                                            <input type="text" name="payment_due_date" value="{{$supplier->payment_due_date}}"  class="form-control bg-transparent" placeholder="" />
                                                        </div>
                                                        <input type='hidden' name='restrict' value='off' />
                                                    </div>
                                                    
                                                    <div class="col-md-12"></div>
                                                    <div class="clearfix" style="margin-top:20px"></div>
                                                    <div class='text-center' style="width: 100%;">
                                                        <button type='submit' class="btn  btn-primary btn-sm rounded-0 text-uppercase px-5 mr-sm-3 mr-0 float-sm-right">Save</Button>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                            </div>
                       </div>
    </div>


@endsection

@section('extra')
<script>
$(document).ready(function () {
     $("[name=payment_type]").click(function(){
        if($(this).val() == 'credit'){
            $(".credit_method").fadeIn("slow");
        }else{
            $(".credit_method").fadeOut("fast");
        }
        
    });
});
</script>
@endsection