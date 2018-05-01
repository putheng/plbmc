<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert"> 
                    <strong>Well done!</strong> 
                    {{ session('success') }} 
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-error" role="alert"> 
                    <strong>Well done!</strong> 
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</div>