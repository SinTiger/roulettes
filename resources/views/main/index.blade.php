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


      <!-- Default box -->
      [Сделать здесь вывод складов, которые есть в системе]
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Запасы</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 10%">
                          Товар
                      </th>
                      <th style="width: 10%">
                          Кол-во
                      </th>
                      <th style="width: 10%">
                          Склад
                      </th>
                  </tr>
              </thead>
              <tbody>
                {{-- @foreach ($data as $assistant) --}}
                    <tr>
                      <td>
                        Товар 1
                      </td>
                      <td>
                        59
                      </td>
                      <td>
                        Склад 1
                      </td>
                    </tr>
                {{-- @endforeach --}}
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>





      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection



