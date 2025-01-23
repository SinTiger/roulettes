@extends('layouts.lk')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$product->name}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('product.index')}}">Товары</a></li>
              <li class="breadcrumb-item active">{{$product->name}}</li>
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

        <div class="row mb-3">
            <div class="col-3">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-block btn-primary">Редактировать</a>
            </div>

            <div class="col-3">
                <a class="btn btn-block btn-danger" style="max-width: 100px; display: inline-block; margin-top: 0px;" onclick="deleteItem('{{$product->name}}', '{{$product->id}}')">Удалить</a>
            </div>

            <form action="{{route('product.destroy', $product->id)}}" method="post" style="display:none;">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm" id="js-click-delete-item-{{$product->id}}" style="">Удалить</button>
            </form>
        </div>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Детали товара</h3>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-10 order-1 order-md-2">
                <h3 class="text-primary">{{$product->name}}</h3>
                <p>Описание: {{$product->desc}}</p>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection



