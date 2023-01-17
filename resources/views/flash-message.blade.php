<style>
    .alert {
        position: fixed;
        width: 40%;
        left: 50%;
        transform: translate(-50%, 0);

        z-index: 9999;
        top: 20px;
        padding: 1rem !important;
        padding-left: 1.5rem !important;
        padding-right: 2.5rem !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="myAlert">
        <i class="fas fa-grin"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
        <i class="fas fa-frown"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="myAlert">
        <i class="fas fa-meh"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert" id="myAlert">
        <i class="fas fa-info-circle"></i>
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
        <i class="fas fa-question-circle"></i>
        <strong>Verifique se há erros no formulário.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    window.setTimeout(function() {
        var alerta = document.getElementById('myAlert');
        alerta.classList.remove('show');
        alerta.classList.add('fade');
    }, 3000);
</script>
