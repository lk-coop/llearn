<div class="errors" style="margin: 20px 0; color: red;">

    @if (session('success'))
        <div class="alert alert_success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert_danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
