@if(session('msg'))
   <div class="alert alert-success">{{session('msg')}}</div>
@endif
@extends($isAdmin ? 'layouts.admin' : 'layouts.client')
@section('content')
   @include($layout)
@endsection