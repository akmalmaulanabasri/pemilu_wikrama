<form action="{{ route('rayon.update', $rayon->id) }}" method="post">
    @csrf

    @method('PUT')

    <div class="form-group">
        <label for="code">Kode</label>
        <input type="text" name="code" id="code" maxlength="3" class="form-control" value="{{ $rayon->code }}" required>
    </div>

    <div class="form-group">
        <label for="name">Nama Rayon</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $rayon->name }}" required>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
        
        <a href="{{ route('rayon.index') }}" class="btn btn-link btn-block">Reset</a>
    </div>

</form>