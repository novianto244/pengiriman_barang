<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Getdata;
use DB;

class DetailController extends Controller
{
    use Getdata;
    public function detail(Request $request){
        $parameter = $request->parameter;
        $arr_parameter = explode("-", $parameter);

        $nama_surat_jalan = $arr_parameter[0];
        $nik = $arr_parameter[1];

        $data = [
            'judul' => 'Detail Surat Jalan - ' . $nama_surat_jalan,
            'nama_surat_jalan' => $nama_surat_jalan,
            'nik' => $nik
        ];
        return view('detail', compact('data'));

    }

    function load_timeline(Request $request){
        $output = '';

        $output .= '
                <div class="page-header">
                    <h6>History of Surat Jalan</h6>
                </div>

                <div class="timeline">
                    <div class="line text-muted"></div>
                    <div class="separator text-muted">
                        <time>26. 3. 2015</time>
                    </div>

                    <article class="panel panel-danger panel-outline">
                        <div class="panel-heading icon">
                            <i class="fa fa-exclamation-circle" style="margin-right:-15px;"></i>
                        </div>

                        <div class="panel-body">
                            <strong>Someone</strong> favourited your photo.
                        </div>
                    </article>

                    <article class="panel panel-default panel-outline">
                        <div class="panel-heading icon">
                            <i class="fa fa-save" style="margin-right:-15px;"></i>
                        </div>

                        <div class="panel-body">
                            <img class="img-responsive img-rounded" src="https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1623287023-best-small-watches-40mm-cwc-g10-1623287014.jpg?crop=1xw:1xh;center,top&resize=480%3A%2A" />
                        </div>
                    </article>

                    <article class="panel panel-primary">
                        <div class="panel-heading icon">
                            <i class="fa fa-plus" style="margin-right:-15px;"></i>
                        </div>

                        <div class="panel-heading">
                            <h2 class="panel-title">New content added</h2>
                        </div>

                        <div class="panel-body">
                            Some new content has been added.
                        </div>

                        <div class="panel-footer">
                            <small>Footer is also supported!</small>
                        </div>
                    </article>

                    <div class="separator text-muted">
                        <time>25. 3. 2015</time>
                    </div>

                    <article class="panel panel-primary">
                        <div class="panel-heading icon">
                            <i class="fa fa-plus" style="margin-right:-15px;"></i>
                        </div>

                        <div class="panel-heading">
                            <h2 class="panel-title">New content added</h2>
                        </div>

                        <div class="panel-body">
                            Some new content has been added.
                        </div>

                        <div class="panel-footer">
                            <small>Footer is also supported!</small>
                        </div>
                    </article>

                    <div class="separator text-muted">
                        <time>25. 3. 2015</time>
                    </div>

                    <article class="panel panel-primary">
                        <div class="panel-heading icon">
                            <i class="fa fa-plus" style="margin-right:-15px;"></i>
                        </div>

                        <div class="panel-heading">
                            <h2 class="panel-title">New content added</h2>
                        </div>

                        <div class="panel-body">
                            Some new content has been added.
                        </div>

                        <div class="panel-footer">
                            <small>Footer is also supported!</small>
                        </div>
                    </article>

                    <div class="separator text-muted">
                        <time>25. 3. 2015</time>
                    </div>


                    <article class="panel panel-info panel-outline">
                        <div class="panel-heading icon">
                            <i class="glyphicon glyphicon-info-sign"></i>
                        </div>

                        <div class="panel-body">
                            That is all.
                        </div>
                    </article>
                </div>

                </div>
        ';

        return response()->json([
            'detail'=>$output,
        ]);   
    }
}