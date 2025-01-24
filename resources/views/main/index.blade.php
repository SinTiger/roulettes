@extends('layouts.lk')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Главная</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Главная</li>
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
                @if (!empty($error))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i>Ошибка!</h5>
                        {{$error}}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            @foreach ($warehouses as $warehouse)
            <a href="{{route('warehouse.show', $warehouse->id)}}"  class="col-lg-3 col-6">
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$warehouse->products->count()}}</h3>
                    <p>{{$warehouse->name}}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </a>
            @endforeach

        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection



