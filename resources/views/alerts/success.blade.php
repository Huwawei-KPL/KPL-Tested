@if (session($key ?? 'status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session($key ?? 'status') }}

</div>
@endif