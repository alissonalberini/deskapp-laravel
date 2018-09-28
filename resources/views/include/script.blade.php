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

<!-- JS INCLUDES - START -->
@yield('scripts')
<!-- JS INCLUDES - END -->