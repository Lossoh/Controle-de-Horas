@extends('app')

@section('title')
    {!! Lang::get('general.app-tittle', ['controller' => Lang::get('general.users')]) !!}
@stop

@section('style')
    <!-- DATA TABLES -->
    {!! Html::style('library/adminLTE/plugins/datatables/dataTables.bootstrap.css') !!}
@stop

@section('content')
        <h1>
            {!! Lang::get('general.users') !!}
            <small>{!! Lang::get('users.list') !!}</small>
        </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div id="messages">
        @if (Session::get('return'))
        <div class="alert alert-{!! Session::get('return')['class'] !!} alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>    <i class="icon fa fa-{!! Session::get('return')['faicon'] !!}"></i> {!! Session::get('return')['status'] !!}!</h4>
          {!! Session::get('return')['message'] !!}
        </div>
        @endif
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{!! Lang::get('general.users') !!}</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="pull-right">
            <a href="{!! URL::to('users/create') !!}" class="btn btn-primary">{!! Lang::get('users.new') !!}</a>
            <a id="delete" data-name="Cliente" class="btn btn-danger">{!! Lang::get('users.delete') !!}</a>
        </div>
        <hr class="clearfix" />
        <table id="user-list" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" class="select-all" /></th>
                    <th>{!! Lang::get('users.title-username') !!}</th>
                    <th>{!! Lang::get('users.title-name') !!}</th>
                    <th>{!! Lang::get('users.title-email') !!}</th>
                    <th>{!! Lang::get('users.title-phone') !!}</th>
                    <th>{!! Lang::get('users.title-created_at') !!}</th>
                    <th>Ação</th>
                </tr>
            </thead>
            @if($data['users']->count())
            <tbody>
                @foreach($data['users'] as $user)
                <tr>
                    <td><input type="checkbox" class="delete" data-value="{!! $user->id !!}" /></td>
                    <td>{!! $user->username !!}</td>
                    <td>{!! $user->first_name . ' ' . $user->last_name !!}</td>
                    <td>{!! $user->email !!}</td>
                    <td>{!! $user->phone !!}</td>
                    <td>{!! date('d/m/Y', strtotime($user->created_at)) !!}</td>
                    <td><a href="{!! URL::to('users/' . $user->id . '/edit') !!}" class="btn btn-primary">{!! Lang::get('general.edit') !!}</a></td>
                </tr>
                @endforeach
            </tbody>
            @endif
        </table>
        {!! Form::open(array('route' => 'users.delete', 'method' => 'DELETE', 'id' => 'delete-form')) !!}
            <input type="hidden" name="id" id="delete-id" name="delete_id" value="">
        {!! Form::close() !!}
    </div><!-- /.box-body -->
    <div class="box-footer">
      Footer
  </div><!-- /.box-footer-->
</div><!-- /.box -->
@endsection

@section('scripts')
    <!-- DATA TABES SCRIPT -->
    {!! Html::script("library/adminLTE/plugins/datatables/jquery.dataTables.min.js") !!}
    {!! Html::script("library/adminLTE/plugins/datatables/dataTables.bootstrap.min.js") !!}
    <!-- SlimScroll -->
    {!! Html::script("library/adminLTE/plugins/slimScroll/jquery.slimscroll.min.js") !!}
    <!-- FastClick -->
    {!! Html::script("library/adminLTE/plugins/fastclick/fastclick.min.js") !!}
@endsection
