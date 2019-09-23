@extends('layouts.default')
@section('title', 'Payment')

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>Message</h5>
        @include('shared._show')
        <p><a href="javascript:history.back()">Go Back</a></p>
    </div>
  </div>
</div>
@stop
