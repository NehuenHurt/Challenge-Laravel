@extends('layouts.app')
@section('head')
    <!-- CDN DATATABLE-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.bootstrap4.min.css"/>
@endsection
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="row align-items-center">
                <div class="col-lg-4">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Voucher #</span>
                    <input  type="text" id="idVoucher" class="form-control">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Account</span>
                    <input type="text" id="idAccount" class="form-control">
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="input-group mb-3">
                    <span class="input-group-text">From</span>
                    <input type="text" id="dateFrom" class="form-control"  placeholder="YYYY-DD-MM HH">
                    <span class="input-group-text">To</span>
                    <input type="text" id="dateTo" class="form-control" placeholder="YYYY-DD-MM HH">
                  </div>
                </div>
                <div class="col-lg-3">
                  <span class="input-group-text">Status</span>
                  <select id="status" data-index="2" class="form-select form-select-lg mb-3">
                    <option selected>View All</option>
                    <option value="AVIS">AVIS</option>
                    <option value="Budget">Budget</option>
                  </select>
                </div>
                <div class="col-lg-4">
                  <button type="button" class="btn btn-primary m-3" id="clearFiltresBtn">
                    Clear Filters
                  </button>
                </div>
              </div>
            </div>
          </div>
          <table id="tableVouchers" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th>Voucher#</th>
                <th>CBA</th>
                <th>Brand</th>
                <th>Account Name</th>
                <th>Issuer Name</th>
                <th>Voucher Status</th>
                <th>Past Due</th>
                <th>Payment File</th>
                <th>Customer Last Name</th>
                <th>Confirmation #</th>
                <th>Issue IATA</th>
                <th>Gross Amount</th>
                <th>GSA Net Amount</th>
                <th>ABG Net Amount</th>
                <th>User</th>
                <th>Create Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($listado as $voucher)
                <tr>
                  <td>{{ $voucher->number }}</td>
                  <td>{{ $voucher->account }}</td>
                  <td>{{ $voucher->company->name }}</td>
                  <td>{{ $voucher->organizationAccountName->name }}</td>
                  <td>{{ $voucher->organizationIssuerName->name }}</td>
                  <td>{{ $voucher->voucherState->name }}</td>
                  <td>{{ $voucher->past_due }}</td>
                  <td>{{ $voucher->payment_file }}</td>
                  <td>{{ $voucher->booking->last_name }}</td>
                  <td>{{ $voucher->booking_number}}</td>
                  <td>{{ $voucher->iata_code }}</td>
                  <td>{{ $voucher->gross_amount }}</td>
                  <td>{{ $voucher->gsa_amount }}</td>
                  <td>{{ $voucher->abg_amount }}</td>
                  <td>{{ $voucher->user_name }}</td>
                  <td>{{ $voucher->issue_date }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-html5-2.2.2/b-print-2.2.2/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
  <script>
    //CREACION DATATABLE
    var table;
    table = $('#tableVouchers').DataTable({
      "scrollX": true,
      dom: 'B<"clear">lfrtip',
      buttons: [
        {
          extend: 'csv',
          text: 'Export',
        }
      ]
    });
    // FILTROS
    $("#idVoucher").keyup(function(){
        table.column($(this).data('index')).search(this.value).draw();
    });
    $("#idAccount").keyup(function(){
        table.column($(this).data('index')).search(this.value).draw();
    });
    $("#status").change(function(){
        table.column($(this).data('index')).search(this.value).draw();
    });
    $("#dateFrom, #dateTo").keyup(function(){
        table.draw();
    });
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        var dateFrom = $('#dateFrom').val();
        var dateTo = $('#dateTo').val();
        var indexCol = 15;
        dateFrom = dateFrom.replace(/-/g, "");
        dateTo= dateTo.replace(/-/g, "");
        var dateCol = data[indexCol].replace(/-/g, "");
        if (dateFrom === "" && dateTo === "")
        {
          return true;
        }
        if(dateFrom === "")
        {
          return dateCol <= dateTo;
        }
        if(dateTo === "")
        {
          return dateCol >= dateFrom;
        }
        return dateCol >= dateFrom && dateCol <= dateTo;
      }
    );
    $("#tableVouchers_filter").hide();
    $("#clearFiltresBtn").on('click',function(){
        $("#idVoucher").val('');
        $("#idAccount").val('');
        $("#status").val('');
        $("#dateFrom").val('');
        $("#dateTo").val('');
        table.search('').columns().search('').draw();
    });
  </script>
@endsection