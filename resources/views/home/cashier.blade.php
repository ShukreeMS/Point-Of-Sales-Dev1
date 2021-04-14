@extends('layouts.app')

@section('content-header')
	Dashboard
@endsection

@section('content')
	<div class="card">
		<div class="card-body text-center">
<<<<<<< Updated upstream
		    <h1>Selamat Datang {{Auth::user()->name}}</h1>
		    <h2>Anda login sebagai Cashier</h2>
		    <h4>Semangat bekerja, karena nikah juga butuh modal</h4>
		    <a class="btn btn-success btn-lg" href="{{ route('transaction.new') }}">BUAT TRANSAKSI</a>
=======
		    <h1>Welcome {{Auth::user()->name}}</h1>
		    <h2>You are logged in as Cashier</h2>
		    <h4>Do you best</h4>
		    <a class="btn btn-success btn-lg" href="{{ route('transaction.new') }}">Make Transaction</a>
>>>>>>> Stashed changes
		</div>
	</div>
@endsection