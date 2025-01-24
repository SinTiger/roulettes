@extends('layouts.lk')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Создать поставку</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Создать поставку</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-sm-12">
                @if (session('message'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i>Предупреждение!</h5>
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body" style="display: block;">

                        <form action="{{route('supply.store')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Поставщик*</label>
                                <select name="supplier_id" class="form-control select2" style="width: 100%;">
                                    @foreach ($suppliers as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Склад*</label>
                                <select name="warehouse_id" class="form-control select2" style="width: 100%;">
                                    @foreach ($warehouses as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('warehouse_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Товар*</label>
                                <select name="product_id" class="form-control select2" style="width: 100%;">
                                    @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Кол-во*</label>
                                <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Цена*</label>
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Дата*</label>
                                <input type="date" class="form-control" data-target="#date" name="date" value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="submit" value="Создать" class="btn btn-success float-right">

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            <!-- /.card -->
            </div>
        </div>










      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
    //Date picker
    $('#date').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: "{{ old('date') }}",
    });
    </script>

@endsection

