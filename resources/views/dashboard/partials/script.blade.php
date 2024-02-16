<script src="{{ asset('assets-UKK/modules/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets-UKK/assets-mazer/static/js/components/dark.js') }}"></script>
<script src="{{ asset('assets-UKK/assets-mazer/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets-UKK/assets-mazer/compiled/js/app.js') }}"></script>
<script src="{{ asset('assets-UKK/assets-mazer/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets-UKK/assets-mazer/static/js/pages/sweetalert2.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inputs = document.querySelectorAll('input[required], select[required], textarea[required]');

        inputs.forEach(function(input) {
            var label = document.querySelector('label[for="' + input.id + '"]');
            if (label) {
                label.innerHTML += '<span class="text-danger ms-1">*</span>';
            }
        });
    });
</script>

<script>
    document.body.addEventListener('click', function(e) {
        const element = e.target;
        const formLogout = document.body.querySelector(".form-logout");

        // console.log(element);

        if (element.classList.contains('btn-logout')) {
            Swal2.fire({
                title: "Apa anda yakin?",
                text: "Ingin logout dari akun anda!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya, Logout!",
            }).then((result) => {
                if (result.isConfirmed) {
                    formLogout.submit();
                }
            });
        }
    })
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
</script>

@yield('script')
