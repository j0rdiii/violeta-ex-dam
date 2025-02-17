<?php

namespace App\Http\Controllers;

use App\Models\Dam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DamControllerWebRoutes extends Controller
{
    public function getDamsFromAPI() {
        // Crear variable para recoger lo que venga
        $response = Http::get('http://jordi-app.test/api/dams');

        $jsonData = $response->json();

        $status = $jsonData['status'];
        $message = $jsonData['message'];
        $data = $jsonData['data'];

        $desiredId = 3;

        $damInfo = null;
        foreach($data as $datas) {
            if (isset($datas['id']) && $datas['id'] == $desiredId) { // isset verifica si una variable esta definida y no es null
                $damInfo = $datas;
                break;
            }
        }

        if ($damInfo) {
            dd($damInfo);
        } else {
            dd("No se encontró la presa con ID: " . $desiredId);
        }

        // dd($status, $message, $data);

        // return view('dams.index',['dam_all' => $dam_all]);
    }

    public function destroyDamByIdFromApi(string $id) {
        try {
            $response = Http::delete("http://jordi-app.test/api/dams/{$id}");
            $jsonData = $response->json();

            $status = $jsonData['status'];
            $message = $jsonData['message'];
            $data = $jsonData['data'];

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data
            ], 200);


        } catch (\Exception $e) {
            return response()->json([
            'status' => 'In catch destroy destroyDamByIdFromApi',
            'message' => $e->getMessage(),
            'data' => 'no data'
            ], 200);
        }
    }

    public function updateDamByIdFromApi(string $id, Request $request){
        try {
            $queryString=urldecode($request->getQueryString());

            $url="http://jordi-app.test/api/dams/{$id}?{$queryString}";
            $response = Http::put($url);
            $jsonData = $response->json();

            $status = $jsonData['status'];
            $message = $jsonData['message'];
            $data = $jsonData['data'];

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                '$request->getQueryString()' => $request->getQueryString(),
                'url' => $url
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
            'status' => 'In catch update updateDamByIdFromApi',
            'message' => $e->getMessage(),
            'data' => 'no data'
            ], 200);
        }
    }

    public function createDamWithJsonBodyReqFromApi(){
        try {
            $newDam = [
                'lenguajes_marcas_grade' => 2,
                'sistemas_informaticos_grade' => 6.3,
                'fol_student_count' => 5,
                'desarrollo_interfaces_status' => 'pending'
            ];
            $url="http://jordi-app.test/api/dams";

            $response = Http::post($url, $newDam);
            $jsonData = $response->json();

            $status = $jsonData['status'];
            $message = $jsonData['message'];
            $data = $jsonData['data'];

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'url' => $url
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
            'status' => 'In catch update updateDamByIdFromApi',
            'message' => $e->getMessage(),
            'data' => 'no data'
            ], 200);
        }
    }

    public function createDamWithBearerJsonBodyReqFromApi(){
        try {
            //$bearerToken = 'a50da3ba1955ef03bb840e61a0c1b072616580f305a972685b73caa6d910f570';
            $newDam = [
                "lenguajes_marcas_grade" => 7,
                "sistemas_informaticos_grade" => 10,
                "fol_student_count" => 23,
                "desarrollo_interfaces_status" => "completed"
            ];
            $url="http://jordi-app.test/api/dams";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer a50da3ba1955ef03bb840e61a0c1b072616580f305a972685b73caa6d910f570'
            ])->post($url, $newDam);
            $jsonData = $response->json();

            $status = $jsonData['status'];
            $message = $jsonData['message'];
            $data = $jsonData['data'];

            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data,
                'url' => $url
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
            'status' => 'In catch update updateDamByIdFromApi',
            'message' => $e->getMessage(),
            'data' => 'no data'
            ], 200);
        }
    }
}
