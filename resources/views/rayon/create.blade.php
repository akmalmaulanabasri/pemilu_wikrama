<form action="{{ route('rayon.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="code">Kode</label>
        <input type="text" name="code" id="code" maxlength="3" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Nama Rayon</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        
        <a href="{{ route('rayon.index') }}" class="btn btn-link btn-block">Reset</a>
    </div>

</form>