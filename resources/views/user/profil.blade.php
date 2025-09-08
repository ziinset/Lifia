<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background: #fffaf5; margin: 0; padding: 20px; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 12px; }
        h1 { color: #333; }
        label { font-weight: bold; display: block; margin-top: 15px; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ddd; border-radius: 6px; }
        button { margin-top: 20px; padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 6px; cursor: pointer; }
        button:hover { background: #218838; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Profil Saya</h1>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf
        @method('POST')

        <label>Nama Lengkap</label>
        <input type="text" value="{{ $user->nama_lengkap }}" disabled>

        <label>Email</label>
        <input type="email" value="{{ $user->email }}" disabled>

        <label>Nomor</label>
        <input type="text" name="nomor" value="{{ $profile->nomor ?? '' }}">

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ ($profile->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ ($profile->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ $profile->tanggal_lahir ?? '' }}">

        <label>Hobi & Minat</label>
        <input type="text" name="hobi" value="{{ $profile->hobi ?? '' }}">

        <label>Bio</label>
        <textarea name="bio">{{ $profile->bio ?? '' }}</textarea>

        <label>Instagram</label>
        <input type="text" name="instagram" value="{{ $profile->instagram ?? '' }}">

        <label>TikTok</label>
        <input type="text" name="tiktok" value="{{ $profile->tiktok ?? '' }}">

        <label>Facebook</label>
        <input type="text" name="facebook" value="{{ $profile->facebook ?? '' }}">

        <button type="submit">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
