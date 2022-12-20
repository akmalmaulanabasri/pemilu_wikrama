<form action="{{ route('candidates.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    <div class="form-group">
        <label for="image">Foto</label>
        <input type="file" name="image" id="image" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="number" name="nis" id="nis" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Nama Kandidat</label>
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
        <label for="rayon_id">Rayon</label>

        <select name="rayon_id" id="rayon_id" class="form-control" required>
            <option selected disabled>Pilih salah satu</option>
            
            @foreach ($rayons as $r)            
                <option value="{{ $r->id }}">{{ $r->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="visi">Visi</label>

        <textarea name="visi" rows="5" id="visi" class="form-control" required></textarea>
    </div>
    
    <div class="form-group">
        <label for="misi">Misi</label>

        <textarea name="misi" rows="5" id="misi" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="misi">Latar Belakang</label>

        <textarea name="latar_belakang" rows="5" id="latar_belakang" class="form-control" required></textarea>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        
        <a href="{{ route('candidates.index') }}" class="btn btn-link btn-block">Reset</a>
    </div>

</form>