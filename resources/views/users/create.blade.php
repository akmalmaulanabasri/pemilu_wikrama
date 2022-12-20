<form action="{{ route('users.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="number" name="nis" id="nis" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="sex">Jenis Kelamin</label>

        <div class="radio">
            <label>
                <input type="radio" name="sex" id="sex" value="Laki-laki" checked>
                Laki-laki
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sex" id="sex" value="Perempuan">
                Perempuan
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" class="form-control" autocomplete="off" required>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        
        <a href="{{ route('users.index') }}" class="btn btn-link btn-block">Reset</a>
    </div>

</form>