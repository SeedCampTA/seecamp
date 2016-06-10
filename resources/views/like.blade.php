@extends('layouts.app')

@section('content')
<script type="text/javascript">
function like() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}'
        }
    });
    $.ajax({
        url: '{{ url('/posts/1/like') }}',
        type: 'PUT',
        success: function(result) {
            alert(result);
        }
    });
}
</script>
<button onclick="like();return false;">Like</button>
@endsection
@section('js')
