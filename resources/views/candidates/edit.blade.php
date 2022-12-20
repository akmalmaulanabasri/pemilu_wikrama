<form action="{{ route('candidates.update', $candidate->id) }}" method="post" enctype="multipart/form-data">
    @csrf

    @method('PUT')

    <div class="form-group">
        <label for="image">Foto <small>(opsional)</small></label>
        <input type="file" name="image" id="image" class="form-control">
        <small class="form-text text-primary">Hanya untuk mengganti foto</small>
    </div>

    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="number" name="nis" id="nis" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="name">Nama Kandidat</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $candidate->name }}" required>
    </div>

    <div class="form-group">
        <label for="sex">Jenis Kelamin</label>

        <div class="radio">
            <label>
                <input type="radio" name="sex" id="sex" value="Laki-laki" {{ ($candidate->sex == "Laki-laki") ? ' checked' : '' }}>
                Laki-laki
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sex" id="sex" value="Perempuan" {{ ($candidate->sex == "Perempuan") ? ' checked' : '' }}>
                Perempuan
            </label>
        </div>
    </div>

    <div class="form-group">
        <label for="rayon_id">Rayon</label>

        <select name="rayon_id" id="rayon_id" class="form-control" required>
            <option disabled>Pilih salah satu</option>
            
            @foreach ($rayons as $r)            
                <option value="{{ $r->id }}" {{ ($candidate->rayon->id == $r->id) ? ' selected' : '' }}>{{ $r->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="visi">Visi</label>

        <textarea name="visi" rows="5" id="visi" class="form-control" required>{{ $candidate->visi }}</textarea>
    </div>
    
    <div class="form-group">
        <label for="misi">Misi</label>

        <textarea name="misi" rows="5" id="misi" class="form-control" required>{{ $candidate->misi }}</textarea>
    </div>

     <div class="form-group">
        <label for="misi">Latar Belakang</label>

        <textarea name="latar_belakang" rows="5" id="latar_belakang" class="form-control" required>{{ $candidate->latar_belakang }}</textarea>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
        
        <a href="{{ route('candidates.index') }}" class="btn btn-link btn-block">Reset</a>
    </div>

</form>