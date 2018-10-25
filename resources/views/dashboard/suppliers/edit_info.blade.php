@extends('layouts.shared')


@section('content')

<div class="col-12 col-md-12 mb-4 mb-md-0">
                                <div class="card redial-border-light redial-shadow">
                                    <div class="card-body">
                                        
                                    
 <div class='alert alert-danger alert-error' style='display:none'></div>
                                        <form id="supplier_form" data-toggle="validator" method="POST"
                                              action="{{ url('dashboard/supplier/web_update_info/'.$supplier->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                              
                                                <div class="form row">
                                                    <div class=" col-md-12">
                                                        <label class="redial-font-weight-800 redial-dark">Email</label>
                                                        <input type="email" name="email" data-error="Email address is invalid" value="{{$supplier->email}}" required class="form-control bg-transparent" placeholder="" />
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class=" col-md-6">
                                                        <label class="redial-font-weight-800 redial-dark">Full Name</label>
                                                        <input type="text" name="name" class="form-control bg-transparent"  value="{{$supplier->name}}" placeholder="" />
                                                       
                                                    </div>
                                                    <div class=" col-md-6">
                                                        <label class="redial-font-weight-800 redial-dark">Phone</label>
                                                        <input type="text" name="phone" class="form-control  bg-transparent" value="{{$supplier->phone}}" placeholder="" />
            
                                                    </div>
                                                    <input type='hidden' name='company_id' value='1' />
                                                    
                                                    <div class="col-md-12">
                                                        <label class="redial-font-weight-800 redial-dark">Address</label>
                                                        <input type="text" name='address' class="form-control bg-transparent" value="{{$supplier->address}}" placeholder="" />
                                                        
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="redial-font-weight-800 redial-dark">Supplier Category</label>
                                                        <select name="category_id" class="form-control select2" >
                                                            <optgroup label="All Categories">
                                                            @foreach($categories as $category)
                                                                <option <?php ($supplier->category_id == $category->id) ? 'selected' : '' ?> value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                            </optgroup>
                                                        </select>
                                                        
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
  
});
</script>
@endsection