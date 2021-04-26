@extends('layouts.app')

@section('content-header')
  Transaction Success!
@endsection

@section('breadcrumb')
   @parent  
   <li>Transaction</li>
   <li>Complete</li>
@endsection

@section('content') 
<div class="card">
      <div class="card-body text-center">
          <div class="alert alert-success alert-dismissible">
            <i class="icon fa fa-check"></i>
            Transaction Saved.
          </div>

          <br><br>
          {{-- @if($setting ?? ''->note_type==1)
            <a class="btn btn-warning btn-lg" href="{{ route('transaction.print') }}">Reprint Note</a>
          @else
            <a class="btn btn-warning btn-lg" onclick="showNote()">Print Note</a>
            <script type="text/javascript">
              showNote();
              function showNote(){
                window.open("{{ route('transaction.pdf') }}", "PDF", "height=650,width=1024,left=150,scrollbars=yes");
              }              
            </script>
          @endif --}}
          <a class="btn btn-warning btn-lg" href="{{ route('transaction.pdf') }}">Print Note</a>
          <a class="btn btn-primary btn-lg" href="{{ route('transaction.new') }}">New Transaction</a>
          <br><br><br><br>
  </div>
</div>
@endsection