@if($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-warning"></i> Atenção!</h4>
    @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<!-- @if(session('success'))
    <div class="alert alert-success ">
        {{ session('success') }}
    </div>
@endif -->

@if(session('error'))
    <div class="alert alert-danger ">
        {{ session('error') }}
    </div>
@endif