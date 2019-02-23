@extends('layouts.general')

@section('pagetitle', 'About')
@section('pagedescription', 'About MCManagement')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-body">

                    <div class="MCManagementLogo"><img class="MCManagementLogo"  src="{{ asset("img/MCManagementLogo.png") }}" alt="Our logo"></div>

                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-default">
                <div class="box-body">

                    <h1 class="text-center">MCManagement</h1>
                    <span class="text-center"><p>A project by <a href="https://genericdevelopment.nl">GenericDevelopment</a></p></span>

                </div>
            </div>
        </div>
    </div>

@endsection