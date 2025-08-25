<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ExportNotificationController extends Controller
{
    public function index()
    {
        return response()->json(Session::get('export_jobs', []));
    }

    public function download($id)
    {
        $jobs = Session::get('export_jobs', []);
        foreach ($jobs as $key => $job) {
            if ($job['id'] === $id && Storage::exists($job['path'])) {
                $file = Storage::path($job['path']);
                $name = basename($file);
                Storage::delete($job['path']);
                unset($jobs[$key]);
                Session::put('export_jobs', $jobs);
                return response()->download($file, $name);
            }
        }
        abort(404);
    }

    public function destroy($id)
    {
        $jobs = Session::get('export_jobs', []);
        foreach ($jobs as $key => $job) {
            if ($job['id'] === $id) {
                if (Storage::exists($job['path'])) {
                    Storage::delete($job['path']);
                }
                unset($jobs[$key]);
                break;
            }
        }
        Session::put('export_jobs', $jobs);
        return response()->json(['status' => 'removed']);
    }
}
