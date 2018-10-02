<!-- js -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert2.js') }}" type="text/javascript"></script>

@if(isset($message))
    <script>
        swal(
            '{{$message['title']}}',
            '{{$message['message']}}',
            '{{$message['type']}}'
        );
    </script>
@endif

@if ($errors->any())

    @foreach ($errors->all() as $error)        
        
    @endforeach
    
    <script>
        swal({
            title: 'Erro',
            text: '{{ $error }}',
            type: 'error',
            showConfirmButton: true,
        });
        </script> 
    
@endif

<!-- JS INCLUDES - START -->
@yield('scripts')
<!-- JS INCLUDES - END -->