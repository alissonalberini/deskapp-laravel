<!-- js -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert2.js') }}" type="text/javascript"></script>

<script>
$("#reset").click(function(){
    history.go(-1);
});
</script>

@if(isset($message))
    <script>
        swal(
            '{{$message['title']}}',
            '{{$message['message']}}',
            '{{$message['type']}}'
        );
    </script>
@endif

@if(session('message'))
    <script>
        swal(
            '{{session('message')['title']}}',
            '{{session('message')['message']}}',
            '{{session('message')['type']}}'
        );
    </script>
@endif

<!--@if ($errors->any())
    <script>
        swal({
            title: 'Existem erros na validação do formulário',
            text: 'Verifique os campos destacados, com os valores digitados.',
            type: 'error',
            showConfirmButton: true,
        });
    </script>
@endif-->

<!-- JS INCLUDES - START -->
@yield('scripts')
<!-- JS INCLUDES - END -->