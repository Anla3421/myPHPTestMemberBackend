@extends('layouts.nav')
@section('js')
    

{{-- <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script> --}}
{{-- <form action="ckeditor/image_upload"> --}}
<textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea> 
{{-- </form> --}}

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor',{});
    
</script> 
@endsection
