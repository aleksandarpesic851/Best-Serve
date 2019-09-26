@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('messages.dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="userChat"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">{{ __('messages.registerd_users')}} - <span class="text-success"> {{$totalUser}} </span> </h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="blackChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">{{ __('messages.reported_blacklist')}} - <span class="text-success"> {{$totalBlacklist}} </span></h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-header card-header-success">
              <h4 class="card-title">{{ __('messages.latest_user')}}</h4>
            </div>
            <div class="card-body table-responsive user-table">
              <table class="table">
                <thead class="text-warning">
                  <th>{{ __('messages.no')}}</th>
                  <th>{{ __('messages.photo')}}</th>
                  <th>{{ __('messages.company')}}</th>
                </thead>
                <tbody>
                <?php $i = 0;?>
                @foreach($users as $user)
                  <?php $i++; ?>
                  <tr>
                    <td>{{$i}}</td>
                    @if($user->avatar)
                    <td><img src="/uploads/avatars/{{$user->avatar}}" class="avatar-blacklist"></td>
                    @else
                    <td><img src="/material/img/user.png" class="avatar-blacklist"></td>
                    @endif
                    <td>{{$user->company}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">{{ __('messages.latest_blacklist')}}</h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>{{ __('messages.no')}}</th>
                  <th>{{ __('messages.photo')}}</th>
                  <th>{{ __('messages.full_name')}}</th>
                  <th>{{ __('messages.affected_entity')}}</th>
                  <th>{{ __('messages.denounced_action')}}</th>
                </thead>
                <tbody>
                <?php $i = 0;?>
                @foreach($blacklists as $blacklist)
                  <?php $i++; ?>
                  <tr onclick="document.location.href='/blacklist/showdata/{{$blacklist->id}}'">
                    <td>{{$i}}</td>
                    @if($blacklist->avatar)
                    <td><img src="/uploads/blacklists/{{$blacklist->avatar}}" class="avatar-blacklist"></td>
                    @else
                    <td><img src="/material/img/user.png" class="avatar-blacklist"></td>
                    @endif
                    <td>{{$blacklist->full_name}}</td>
                    <td>{{$blacklist->affected_entity}}</td>
                    <td>{{$blacklist->denounced_action}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    <?php
    echo "const userVal = ". json_encode($userVal) . ";\n";
    echo "const dateVal = ". json_encode($dateVal) . ";\n";
    echo "const blackVal = ". json_encode($blackVal) . ";\n";
    ?>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush