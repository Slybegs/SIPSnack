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

@pushIf(Session::has('success'), 'script')
    <script type="module">
        (new bootstrap.Toast($('.toast-success')[0])).show()); // This show them
    </script>
@endPushIf
@pushIf(Session::has('failure'), 'script')
    <script type="module">
        (new bootstrap.Toast($('.toast-danger')[0])).show()); // This show them
    </script>
@endPushIf
