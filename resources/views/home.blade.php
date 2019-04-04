@extends('layouts.app')

@section('content')
<input type="hidden" id="ajax-url" url="https://demo.accesspressthemes.com/construction/wp-admin/admin-ajax.php" />
<div id="page" class="site">
    @include('layouts.home.introSlide')
    <div id="content" class="site-content">
        @include('layouts.home.aboutUs')
        @include('layouts.home.appServices')
        {{-- @include('layouts.teamMembers') --}}
        @include('layouts.home.portfolio')
        {{-- @include('layouts.home.blog') --}}
        @include('layouts.home.helpYou')
        {{-- @include('layouts.home.shopItems') --}}
        {{-- @include('layouts.home.companyClients') --}}
    </div>
</div>
@endsection