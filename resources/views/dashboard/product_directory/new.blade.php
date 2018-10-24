@extends('layouts.shared')

@section('content')


    <div class="col-12 col-xl-6">
        <div class="card redial-border-light redial-shadow mb-4">
            <div class="card-body">
                @if ($errors->has('file'))
                    <div class="alert alert-danger">
                        <button class="close" data-close="alert">

                        </button> {{ $errors->first('file') }} </div>
                @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif






                <form  action="{{route('product_directory.store')}}"
                       method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="redial-font-weight-600 d-block">Uploud Products Sheet</label>
                        <input type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    </div>

                    <div class="redial-divider my-4"></div>
                    <button type="submit" class="btn btn-primary green">Submit</button>
                </form>
            </div>
        </div>

    </div>

@endsection

