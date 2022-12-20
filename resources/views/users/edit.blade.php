<form action="{{ route('users.update', $user->id) }}" method="post">
    @csrf

    @method('PUT')

    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="number" name="nis" id="nis" class="form-control" value="{{ $user->nis }}" required>
    </div>

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="form-group">
        <label for="sex">Jenis Kelamin</label>

        <div class="radio">
            <label>
                <input type="radio" name="sex" id="sex" value="Laki-laki" {{ ($user->sex == "Laki-laki") ? ' checked' : '' }}>
                Laki-laki
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sex" id="sex" value="Perempuan" {{ ($user->sex == "Perempuan") ? ' checked' : '' }}>
                Perempuan
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="rayon_id">Rayon</label>

        <select name="rayon_id" id="rayon_id" class="form-control" required>
            <option disabled>Pilih salah satu</option>
            
            @foreach ($rayons as $r)            
                <option value="{{ $r->id }}" {{ ($user->rayon->id == $r->id) ? ' selected' : '' }}>{{ $r->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="password">Password Baru</label>
        <input type="text" name="password" id="password" class="form-control" placeholder="Hanya untuk mengganti password" autocomplete="off">
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
        
        <a href="{{ route('users.index') }}" class="btn btn-link btn-block">Reset</a>
    </div>

</form>