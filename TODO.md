# TODO - Fix tambah project, hapus gambar, dan cover berubah

- [ ] Analisa akar masalah dari `ProjectController@store`, `ProjectController@update`, dan blade create/edit.
- [ ] Perbaiki validasi & input cover saat create: samakan `cover_image_index` dengan controller (gunakan `cover_image_index` atau ganti controller agar terima `cover_image` path/string).
- [ ] Perbaiki logika update cover saat edit: pastikan radio cover mengirim nilai yang sesuai dengan struktur `$data['images']` (existing + new).
- [ ] Pastikan hapus gambar berhasil: cek route name `admin.projects.image.delete` dan parameter yang diterima controller (`deleteImage(Project $project, Request $request)`).
- [ ] Buat hidden input agar gambar yang dihapus benar-benar tidak terkirim ke `existing_images` saat submit update.
- [ ] (Opsional) Tambahkan penanganan AJAX delete agar juga menghapus hidden input + menyesuaikan cover.
- [ ] Jalankan pemeriksaan manual: tambah project, delete gambar, ubah cover, refresh halaman.
