@extends('layouts.general')

@section('pagetitle', 'MOTD Settings')
@section('pagetitle', 'Edit your server MOTD')

@section('content')

    <form action="{{ route('networkmanagerMOTDUpdate') }}" method="post">
        @csrf
        <input type="text" class="form-control" name="motd_text" value="{{ $motd['motd_text'] }}"
               placeholder="Message that appears in the multiplayer menu">
        <input type="text" class="form-control" name="motd_description" value="{{ $motd['motd_description'] }}"
               placeholder="Message that appears when hovering over playercount">
        <input type="text" class="form-control" name="motd_icon" value="{{ $motd['motd_icon'] }}"
               placeholder="The Server Icon">
        <input type="submit" value="Save MOTD">

        <img src="{{ $motd['motd_icon'] }}">
    </form>

@endsection

