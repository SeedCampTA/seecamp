@extends('layouts.app')

@section('content')
<script type="text/javascript">
function like(post) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': 
        }
    });
    $.ajax({
        url: '/posts/'+post+'/like',
        type: 'PUT',
        success: function(result) {
            if (result != 1) {
                alert('Error!');
            }
        }
    });
}
</script>
<input type="hidden" name="csrf_token" value="">{{ csrf_token() }}'
<button onclick="like(1);return false;">Like!</button>
@endsection
@section('js')
