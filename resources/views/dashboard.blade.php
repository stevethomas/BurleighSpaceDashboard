@extends('layouts/master')

@section('content')

    @javascript(compact('pusherKey'))

    <div class="dashboard" id="dashboard">
        <internet-connection grid="a1"></internet-connection>

        <meetings grid="a2"></meetings>

        <google-calendar grid="a3"></google-calendar>

        <burleigh-space grid="b1:c1"></burleigh-space>

        <news grid="b2:c3"></news>

        <current-time grid="d1" dateformat="ddd DD/MM"></current-time>

        <outside grid="d2"></outside>

        <inside grid="d3"></inside>
    </div>

@endsection
