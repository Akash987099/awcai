<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            showAlert('success', 'Success!', "{{ session('success') }}");
        @elseif (session('error'))
            showAlert('danger', 'Error!', "{{ session('error') }}");
        @elseif (session('warning'))
            showAlert('warning', 'Warning!', "{{ session('warning') }}");
        @elseif (session('info'))
            showAlert('info', 'Info!', "{{ session('info') }}");
        @endif

        @if ($errors->any())
            showAlert('danger', 'Validation Error!', '{{ $errors->first() }}');
        @endif
    });
</script>
</body>

</html>
