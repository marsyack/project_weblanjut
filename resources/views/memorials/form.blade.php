@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div>
        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="nama"
               value="{{ old('nama', $memorial->nama ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block font-semibold mb-1">Hubungan</label>
        <input type="text" name="hubungan"
               value="{{ old('hubungan', $memorial->hubungan ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

    <div>
        <label class="block font-semibold mb-1">Status</label>
        <select name="status" class="w-full border rounded-lg px-4 py-2">
            <option value="Masih Hidup"
                {{ old('status', $memorial->status ?? '') == 'Masih Hidup' ? 'selected' : '' }}>
                Masih Hidup
            </option>
            <option value="Telah Berpulang"
                {{ old('status', $memorial->status ?? '') == 'Telah Berpulang' ? 'selected' : '' }}>
                Telah Berpulang
            </option>
        </select>
    </div>

    <div>
        <label class="block font-semibold mb-1">Tanggal Dibuat</label>
        <input type="date" name="tanggal_dibuat"
               value="{{ old('tanggal_dibuat', $memorial->tanggal_dibuat ?? '') }}"
               class="w-full border rounded-lg px-4 py-2">
    </div>

</div>

<div class="mt-4">
    <label class="block font-semibold mb-1">Foto</label>
    <input type="file" name="foto"
           class="w-full border rounded-lg px-4 py-2">
</div>

<div class="mt-4">
    <label class="block font-semibold mb-1">Cerita Kenangan</label>
    <textarea name="cerita" rows="5"
              class="w-full border rounded-lg px-4 py-2">{{ old('cerita', $memorial->cerita ?? '') }}</textarea>
</div>

<div class="mt-4">
    <label class="block font-semibold mb-1">Doa dan Harapan</label>
    <textarea name="doa" rows="4"
              class="w-full border rounded-lg px-4 py-2">{{ old('doa', $memorial->doa ?? '') }}</textarea>
</div>

<button type="submit"
        class="mt-6 bg-rose-500 text-white px-6 py-2 rounded-lg hover:bg-rose-600">
    Simpan
</button>