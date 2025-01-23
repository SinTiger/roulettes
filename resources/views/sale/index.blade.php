@extends('layouts.lk')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Продажи</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
              <li class="breadcrumb-item active">Продажи</li>
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

        <div class="row mb-3">
            <div class="col-3">
                <a href="{{ route('sale.create') }}" class="btn btn-block btn-primary">Создать продажу</a>
            </div>
        </div>



      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Продажи</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th>
                        Товар
                      </th>
                      <th>
                        Покупатель
                      </th>
                      <th>
                        Кол-во
                      </th>
                      <th>
                        Сумма
                      </th>
                      <th>
                        Дата
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                    <tr>
                      <td>
                        <a href="{{route('sale.show', $item->id)}}">{{$item->product->name}}</a>
                      </td>
                      <td>
                        {{$item->buyer->name}}
                      </td>
                      <td>
                        {{$item->quantity}}
                      </td>
                      <td>
                        {{$item->quantity * $item->price}}
                      </td>
                      <td>
                        {{$item->date}}
                      </td>
                  </tr>
                @endforeach



              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>





      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection



