@extends('layouts.app', ['activePage' => 'blacklist', 'titlePage' => __('messages.black_lists')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" >
            <h3 class="card-title">{{ __('messages.search') }}</h3>
            <div class="row search_form" id="search_form" style="display:none">
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.full_name')}}" type="text" name="full_name" id="full_name">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" data-toggle="datepicker" placeholder="{{ __('messages.birthday')}}" type="text" name="birthday" id="birthday">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.business')}}" type="text" name="business" id="business">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.nationality') }}" type="text" name="nationality" id="nationality">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.search_national_id')}}" type="text" name="national_id_card_no" id="national_id_card_no">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.social_security')}}" type="text" name="social_security_no" id="social_security_no">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.search_residence') }}" type="text" name="country_residence" id="country_residence">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.zip_code') }}" type="text" name="zip_code" id="zip_code">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" placeholder="{{ __('messages.content') }}" type="text" name="content" id="content">
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" data-toggle="datepicker" type="text" name="start_date" id="start_date" placeholder="{{ __('messages.start_date') }}"> 
              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-3 md-form">
                <input class="form-control" data-toggle="datepicker" type="text" name="end_date" id="end_date" placeholder="{{ __('messages.end_date') }}"> 
              </div>
            </div>
          </div>

          <div class="card-body">
            @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif

            <div class="row">
              <div class="col-12 text-right">
                <a href="#" class="btn btn-sm btn-primary">{{ __('messages.search') }}</a>
              </div>
            </div>

          <div class="table-responsive">
            <table class="table" id="blacklist_datatable">
              <thead class="text-primary">
                  <tr>
                    <th>{{ __('messages.id') }}</th>
                    <th>{{ __('messages.no') }}</th>
                    <th>{{ __('messages.photo') }}</th>
                    <th class="td-middle">{{ __('messages.full_name') }}</th>
                    <th class="td-middle">{{ __('messages.birthday') }}</th>
                    <th class="td-middle">{{ __('messages.business') }}</th>
                    <th class="td-middle">{{ __('messages.nationality') }}</th>
                    <th class="td-middle">{{ __('messages.id_card') }}</th>
                    <th class="td-middle">{{ __('messages.social_no') }}</th>
                    <th class="td-middle">{{ __('messages.search_residence') }}</th>
                    <th class="td-middle">{{ __('messages.zip_code')}}</th>
                    <th class="td-wide">{{ __('messages.content') }}</th>
                    @if (auth()->user()->isAdmin())
                    <th>{{ __('messages.action') }}</th>
                    @endif
                  </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection

@push('js')
<link  href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" rel="stylesheet">
<link  href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css" rel="stylesheet">
<link  href="/material/datepicker/datepicker.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="/material/datepicker/datepicker.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('#search_form').show();

    var table = $('#blacklist_datatable').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            scrollX: true,
            language: {
              emptyTable: "{{ __('messages.empty_table') }}",
              paginate: {
                previous: "{{ __('messages.prev') }}",
                next:  "{{ __('messages.next') }}",
              },
              info: "{{ __('messages.showing_details') }}",
              sLengthMenu: "{{ __('messages.show_entries') }}",
            },
            ajax: {
              url: "/blacklist/getdata",
              type: 'GET',
              data: function (d) {
                d.start_date = $('#start_date').val();
                d.end_date = $('#end_date').val();
                d.full_name = $('#full_name').val();
                d.birthday = $('#birthday').val();
                d.business = $('#business').val();
                d.nationality = $('#nationality').val();
                d.national_id_card_no = $('#national_id_card_no').val();
                d.social_security_no = $('#social_security_no').val();
                d.country_residence = $('#country_residence').val();
                d.zip_code = $('#zip_code').val();
                d.content = $('#content').val();
              }
            },
            columns: [
                      { data: 'id', name: 'id', 'visible': false },
                      {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
                      {data: 'avatar', name: 'avatar', orderable: false,searchable: false},
                      { data: 'full_name', name: 'full_name' },
                      { data: 'birthday', name: 'birthday' },
                      { data: 'business', name: 'business' },
                      { data: 'nationality', name: 'nationality' },
                      { data: 'national_id_card_no', name: 'national_id_card_no' },
                      { data: 'social_security_no', name: 'social_security_no' },
                      { data: 'country_residence', name: 'country_residence' },
                      { data: 'zip_code', name: 'zip_code' },
                      { data: 'content', name: 'content' },
                      @if (auth()->user()->isAdmin())
                      {data: 'action', name: 'action', orderable: false},
                      @endif
                  ]
        });

    $('#blacklist_datatable tbody').on( 'click', 'tr', function (event) {
      if (event.target.className == "material-icons")
        return;
      document.location.href = "/blacklist/showdata/" + table.row(this).data().id;
    });
    
    $('body').on('click', '#delete_item', function (event) {
        event.stopPropagation();
        const list_id = $(this).data("id");
        const token = $("meta[name='csrf-token']").attr("content");
        if (!confirm("{{ __('messages.delete_blacklist_detail') }}"))
          return false;

        $.ajax({
            type: "GET",
            url: "/blacklist/delet/"+list_id,
            data: {
              "_token": token,
            },
            success: function (data) {
              const oTable = $('#blacklist_datatable').dataTable(); 
              oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        return false;
    });

    $('body').on('click', '#edit_item', function (event) {
      event.stopPropagation();
      const list_id = $(this).data("id");
      document.location.href = "/blacklist/" + list_id + "/edit";
      return false;
    });

    $('[data-toggle="datepicker"]').datepicker();
    $('.form-control').change(function() {
      table.draw(false);
    });

  });   
</script>
@endpush