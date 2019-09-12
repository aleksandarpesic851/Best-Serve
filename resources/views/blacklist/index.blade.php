@extends('layouts.app', ['activePage' => 'blacklist', 'titlePage' => __('Black Lists')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" >
            <h3 class="card-title">Search</h3>
            <div class="row search_form" id="search_form" style="display:none">
              <input class="col-sm-12 form-control" placeholder="Full Name" type="text" name="full_name" id="full_name">
              <input class="col-sm-12 form-control" data-toggle="datepicker" placeholder="Birthday" type="text" name="birthday" id="birthday">
              <input class="col-sm-12 form-control" placeholder="Business" type="text" name="business" id="business">
              <input class="col-sm-12 form-control" placeholder="Nationality" type="text" name="nationality" id="nationality">
              <input class="col-sm-12 form-control" placeholder="National Id Card Number" type="text" name="national_id_card_no" id="national_id_card_no">
              <input class="col-sm-12 form-control" placeholder="Social Security Number" type="text" name="social_security_no" id="social_security_no">
              <input class="col-sm-12 form-control" placeholder="Country Residence" type="text" name="country_residence" id="country_residence">
              <input class="col-sm-12 form-control" placeholder="Zip/Postal Code" type="text" name="zip_code" id="zip_code">
              <input class="col-sm-12 form-control" placeholder="Content" type="text" name="content" id="content">
              <input class="form-control" data-toggle="datepicker" type="text" name="start_date" id="start_date" placeholder="Please select start date"> 
              <input class="form-control" data-toggle="datepicker" type="text" name="end_date" id="end_date" placeholder="Please select start date"> 
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
                <a href="#" class="btn btn-sm btn-primary">{{ __('Search') }}</a>
              </div>
            </div>

          <div class="table-responsive">
            <table class="table" id="blacklist_datatable">
              <thead class="text-primary">
                  <tr>
                    <th>Id</th>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Birthday</th>
                    <th>Business</th>
                    <th>Nationality</th>
                    <th>Id Card</th>
                    <th>Social No</th>
                    <th>Country Residence</th>
                    <th>Zip Code</th>
                    <th>Content</th>
                    <th>Action</th>
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
            language: {
              "emptyTable": "WE CANNOT FIND THE INFORMATION PROVIDED, TRY SEARCHING WITH ANOTHER FIELD"
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
                      {data: 'action', name: 'action', orderable: false},
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
        if (!confirm("Are You sure want to delete !"))
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