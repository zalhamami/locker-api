<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\ModelLoker;
use Carbon\Carbon;
use App\Models\ModelAppLoker;
use App\Models\ModelAppLogin;
use App\Models\MasterLoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Auth;
use Response;

class ControllerAPI extends Controller
{
    public function historyl1(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $l1 = $request->get('loker');
        $loker = ModelAppLoker::where('loker', $l1)->get();
        echo json_encode($loker);
    }

    public function presensi()
    {
        header("Access-Control-Allow-Origin: *");
        $presensi = ModelAppLogin::all();
        echo json_encode($presensi);
    }

    public function APIRegister(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $name = $request->input('name');
        $institusi = $request->input('institusi');
        $email = $request->input('email');
        $pass = $request->input('password');
        $postdata = ModelUser::select('*')->where('name', $name)->first();

        if (empty($postdata)) {
            ModelUser::create([
                'institusi' => $institusi,
                'email' => $email,
                'name'   => $name,
                'role_status' => 4,
                'password'        => Hash::make($pass),
            ]);
            $response['success'] = 1;
            $response['message'] = 'Register Berhasil';
            echo json_encode($response);
        } else {
            $response['success'] = 0;
            $response['message'] = 'Register Tidak Berhasil';
            echo json_encode($response);
        }
    }

    //mahassiwa
    public function APIRegister1(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $name = $request->input('name');
        $nim = $request->input('nim');
        $email = $request->input('email');
        $jurusan = $request->input('jurusan');
        $prodi = $request->input('prodi');
        $pass = $request->input('password');
        $postdata = ModelUser::select('*')->where('name', $name)->first();

        if (empty($postdata)) {
            ModelUser::create([
                'nim' => $nim,
                'email' => $email,
                'name'   => $name,
                'jurusan'   => $jurusan,
                'program_studi'   => $prodi,
                'role_status' => 3,
                'password'        => Hash::make($pass),
            ]);
            $response['success'] = 1;
            $response['message'] = 'Register Berhasil';
            echo json_encode($response);
        } else {
            $response['success'] = 0;
            $response['message'] = 'Register Tidak Berhasil';
            echo json_encode($response);
        }
    }

    public function APIRegister2(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $name = $request->input('name');
        $nip = $request->input('nip');
        $prodi = $request->input('prodi');
        $email = $request->input('email');
        $pass = $request->input('password');
        $postdata = ModelUser::select('*')->where('name', $name)->first();

        if (empty($postdata)) {
            ModelUser::create([
                'nip' => $nip,
                'name'   => $name,
                'program_studi'   => $prodi,
                'email' => $email,
                'role_status' => 2,
                'password'        => Hash::make($pass),
            ]);
            $response['success'] = 1;
            $response['message'] = 'Register Berhasil';
            echo json_encode($response);
        } else {
            $response['success'] = 0;
            $response['message'] = 'Register Tidak Berhasil';
            echo json_encode($response);
        }
    }

    //API LOGIN
    public function APILogin(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $name = $request->get('email');
        $data = ModelUser::where('email', $name)->first();
        if ($data != null) {
            $app_login = ModelAppLogin::where('text', $data->name)->first();
            if ($app_login != null) {
                $date = $app_login->date_login;
                if ($date != Carbon::now()->toDateString()) {
                    ModelAppLogin::create([
                        'text' => $data->name,
                        'date_login' => Carbon::now()->toDateString(),
                        'time_login' => Carbon::now()->toTimeString()
                    ]);
                }
            } else if ($app_login == null) {
                ModelAppLogin::create([
                    'text' => $data->name,
                    'date_login' => Carbon::now()->toDateString(),
                    'time_login' => Carbon::now()->toTimeString()
                ]);
            }
            $response['role'] = $data->role_status;
            $response['name'] = $data->name;
            $response['success'] = 1;
            $response['message'] = 'Login Berhasil';
            echo json_encode($response);
        } else {
            $response['success'] = 0;
            $response['message'] = 'Login Tidak Berhasil';
            echo json_encode($response);
        }
    }

    // LOKER
    // Pinjam / Selesaikan Loker
    public function APICheck(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $name = $request->get('name');
        $loker = $request->get('loker');
        //$data = ModelAppLoker::where('loker', $loker)->where('status_active', '1')->first();
        //if ( $data == null){
        ModelAppLoker::create([
            'loker' => $loker,
            'text'   => $name,
            'status_active' => '1'
        ]);
        $data = MasterLoker::where('id', $loker)->first();

        $data->update([
            'status_loker'   => '0'
        ]);

        $response['success'] = 1;
        $response['message'] = 'Loker Berhasil Dipinjam';
        echo json_encode($response);
        //}
        // else{
        //     if($data->status_active == 1) {
        //         if($name == $data->text){
        //             $response['success'] = 2;
        //             $response['message'] = 'Selamat Datang Kembali';
        //             echo json_encode($response);
        //         }else{
        //             $response['success'] = 0;
        //             $response['message'] = 'Loker sudah digunakan';
        //             echo json_encode($response);
        //         }
        //     }else{
        //         if($name == $data->text ){
        //             $data->update([
        //                 'loker' => $loker,
        //                 'text'   => $name,
        //                 'status_active' => '1'
        //             ]);
        //             $response['success'] = 1;
        //             $response['message'] = 'Loker Berhasil Dipinjam';
        //             echo json_encode($response);
        //         }else{
        //             ModelAppLoker::create([
        //                 'loker' => $loker,
        //                 'text'   => $name,
        //                 'status_active' => '1'
        //             ]);
        //             $response['success'] = 1;
        //             $response['message'] = 'Loker Berhasil Dipinjam';
        //             echo json_encode($response);
        //         }

        //     }
        // }
    }

    //selesaikan peminjaman
    public function APIFinish(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $name = $request->get('name');
        $loker = $request->get('loker');
        //$data = ModelAppLoker::where('loker', $loker)->where('status_active','1')->first();
        //if ( $data != null){
        $user = ModelAppLoker::where('text', $name)->first();
        $user->delete();
        ModelAppLoker::create([
            'loker' => $loker,
            'text'   => $name,
            'status_active' => '0'
        ]);
        $data = MasterLoker::where('id', $loker)->first();

        $data->update([
            'status_loker'   => '1'
        ]);
        $response['success'] = 1;
        $response['message'] = 'Loker Berhasil Diselesaikan';
        echo json_encode($response);
        // }else{
        //     $response['success'] = 0;
        //     $response['message'] = 'Loker Belum Diselesaikan';
        //     echo json_encode($response);
        // }
    }

    // Open Loker
    public function APIOpen(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $loker = $request->get('loker');
        $now = Carbon::now();
        $data = ModelLoker::where('text', $loker)->first();
        if ($data == null) {
            ModelLoker::create([
                'text' => $loker,
                'open_date'   => $now
            ]);
            $response['success'] = 1;
            $response['message'] = 'Loker Berhasil Dibuka';
            echo json_encode($response);
        } else {
            $response['success'] = 0;
            $response['message'] = 'Loker Sudah Terbuka';
            echo json_encode($response);
        }
    }

    // Close Loker
    public function APIClose(Request $request)
    {
        header("Access-Control-Allow-Origin: *");
        $response = array();
        $loker = $request->get('loker');
        $now = Carbon::now();
        $data = ModelLoker::where('text', $loker)->first();
        if ($data != null) {
            $data->update([
                'closed_date'   => $now
            ]);
            $response['success'] = 1;
            $response['message'] = 'Loker Berhasil Ditutup';
            echo json_encode($response);
        }
    }

    // All Loker
    public function APIAllLoker()
    {
        $loker = MasterLoker::all();
        echo json_encode($loker);
    }
}
