@extends('layouts.admin-layout')

@section("title', 'Laravel - User's Profile")

@section('main-header')
    <h4>{{ strtoupper('Dashboard Panel') }}</h4>
@endsection

@section('main-content')

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modalBesar">Large modal</button>
 
<div class="modal fade modalBesar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
 
    <div class="modal-content">
      <div class="modal-header">
        <h5>Modal large (lg)</h5>
      </div>
      <div class="modal-body">
        Contoh modal berukuran sedang.
      </div>
    </div>
 
  </div>
</div>

@endsection

{{-- @section('after-script')
<script>
    
  </script>
@endsection --}}