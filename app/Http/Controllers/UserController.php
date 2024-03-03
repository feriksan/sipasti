<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

date_default_timezone_set("Asia/Jakarta");

class UserController extends Controller
{
    use FileUploadTrait;


    // =============== Tampilkan =======================
    public function index()
    {
        $kode_awal = "KD";
        $user = User::select(DB::raw('RIGHT(users.kode_user,2) as kode_user', FALSE))
            ->orderBy('kode_user', 'DESC')
            ->limit(1)
            ->get();

        if ($user->count() <> 0) {
            $data = $user->first();
            $kode_baru = intval($data->kode_user) + 1;
        } else {
            $kode_baru = 1;
        }

        $nomorUrut = str_pad($kode_baru, 2, "0", STR_PAD_LEFT);
        $kode_otomatis = $kode_awal . $nomorUrut;

        $data = [
            'judul_web' => 'Daftar User',
            'judul_halaman' => 'Daftar User',
            'kode_otomatis' => $kode_otomatis,
            'user' => DB::table('users')->get(),
        ];
        $html = view('user/tampil_user', $data)->render();
        return response($html, 200)->header('Content-Type', 'text/html');
    }


    // =============== Simpan =======================
    public function store(Request $request)
    {
        $kode_awal = "KD";
        $user = User::select(DB::raw('RIGHT(users.kode_user,2) as kode_user', FALSE))
            ->orderBy('kode_user', 'DESC')
            ->limit(1)
            ->get();

        if ($user->count() <> 0) {
            $data = $user->first();
            $kode_baru = intval($data->kode_user) + 1;
        } else {
            $kode_baru = 1;
        }

        $nomorUrut = str_pad($kode_baru, 2, "0", STR_PAD_LEFT);
        $kode_otomatis = $kode_awal . $nomorUrut;

        $kode_user = $kode_otomatis;
        $nama = $request->nama;
        $email = $request->email;
        $password = Hash::make($request->password);
        $role = $request->role;
        $foto_user = $request->foto_user;

        $foto_user = $this->fileUpload($request->foto_user, 'foto_user');
        $data['foto_user'] = $foto_user;

        $created = date('Y-m-d');
        $updated = date('Y-m-d');

        $data = [
            'kode_user' => $kode_user,
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'foto_user' => $foto_user,
            'created_at' => $created,
            'updated_at' => $updated,
        ];
        $simpan = DB::table('users')->insert($data);
        if ($simpan) {
            return Redirect('/user')->with('pesan', 'Data User Berhasil Disimpan');
        } else {
            return Redirect('/user')->with('error', 'Data User Gagal Disimpan');
        }
    }


    // ========== Update =========
    public function update(Request $request, $kode_user)
    {
        $nama = $request->nama;
        $email = $request->email;
        $role = $request->role;
        $created_at = $request->tgl_upload;
        $updated_at = date('Y-m-d');
        $foto_user = $this->fileUpload($request->foto_user, 'foto_user');
        $data['foto_user'] = $foto_user;

        $data = [
            'nama' => $nama,
            'email' => $email,
            'role' => $role,
            'foto_user' => $foto_user,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ];
        $update = DB::table('users')->where('kode_user', $kode_user)->update($data);
        if ($update) {
            return Redirect('/user')->with('pesan', 'Data User Berhasil Diubah');
        } else {
            return Redirect('/user')->with('error', 'Data User Gagal Diubah');
        }
    }


    // ======== Hapus ==========
    public function delete($kode_user)
    {
        $delete = DB::table('users')->where('kode_user', $kode_user)->delete();
        if ($delete) {
            return Redirect('/user')->with('pesan', 'Data User Berhasil Dihapus');
        } else {
            return Redirect('/user')->with('error', 'Data User Gagal Dihapus');
        }
    }


    //========================= PROFIL ============================================//

    //perintah tampilkan data profil user
    public function profil($kode_user)
    {
        $profil = DB::table('users')->where('kode_user', $kode_user)->first();
        $data = [
            'judul_web' => 'Profil User',
            'judul_halaman' => 'Profil User',
            'profil' => $profil,
        ];
        return view('user/user_profil', $data);
    }

    public function update_profil(Request $request, $kode_user)
    {
        $kode_user = $kode_user;
        $nama = $request->nama;
        $email = $request->email;
        $role = $request->role;
        $foto_user = $request->foto_user;

        $foto_user = $this->fileUpload($request->foto_user, 'foto_user');
        $data['foto_user'] = $foto_user;

        $created = $request->created_at;
        $updated = date('Y-m-d');

        $data = [
            'kode_user' => $kode_user,
            'nama' => $nama,
            'email' => $email,
            'role' => $role,
            'foto_user' => $foto_user,
            'created_at' => $created,
            'updated_at' => $updated,
        ];
        $update = DB::table('users')->where('kode_user', $kode_user)->update($data);
        if ($update) {
            return Redirect('/home')->with('pesan', 'Profil User Berhasil Diubah');
        } else {
            return Redirect('/home')->with('error', 'Profil User Gagal Diubah');
        }
    }


    // ========= Password ==========
    //perintah tampilkan data profil user
    public function password($kode_user)
    {
        $profil = DB::table('users')->where('kode_user', $kode_user)->first();
        $data = [
            'judul_web' => 'Ubah Password',
            'judul_halaman' => 'Ubah Password',
            'profil' => $profil,
        ];
        return view('user/user_password', $data);
    }

    public function update_password(Request $request, $kode_user)
    {
        $kode_user = $kode_user;
        $user = Auth::user();

        $request->validate([
            'new_password' => 'required|min:4|confirmed',
        ]);
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return Redirect('/home')->with('pesan', 'Password Berhasil Diubah');
    }
}
