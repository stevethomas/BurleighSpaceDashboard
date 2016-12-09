@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

    <div class="dashboard" id="dashboard">
        <internet-connection grid="a3"></internet-connection>

        <google-calendar grid="a1:a2"></google-calendar>

        <last-fm grid="b1:c1"></last-fm>

        <current-time grid="d1" dateformat="ddd DD/MM"></current-time>

        <temperature grid="d3"></temperature>
    </div>

@endsection
