<div class="toast-container">
    @yield('toast')
    @if(Session::has('success'))
        <div class="toast toast-success" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
            <div class="toast-body">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    @if(Session::has('failure'))
        <div class="toast toast-danger" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
            <div class="toast-body">
                {{ Session::get('failure') }}
            </div>
        </div>
    @endif
</div>

@pushIf(Session::has('success') || Session::has('failure'), 'script')
    <script type="module">
        var toastElList = [].slice.call(document.querySelectorAll('.toast'))
        var toastList = toastElList.map(function(toastEl) {
        // Creates an array of toasts (it only initializes them)
          return new bootstrap.Toast(toastEl) // No need for options; use the default options
        });
       toastList.forEach(toast => toast.show()); // This show them

    </script>
@endPushIf
