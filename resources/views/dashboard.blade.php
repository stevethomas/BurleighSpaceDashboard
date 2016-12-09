@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

    <div class="dashboard" id="dashboard">
        <internet-connection grid="a1"></internet-connection>

        <google-calendar grid="a2:a3"></google-calendar>

        <last-fm grid="b1:c1"></last-fm>

        <current-time grid="d1" dateformat="ddd DD/MM"></current-time>

        <outside grid="d2"></outside>

        <inside grid="d3"></inside>
    </div>

@endsection
