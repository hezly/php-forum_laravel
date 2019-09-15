@extends('layouts.app')
@section('content')



                    
                    <div class="span9">

                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>65%</b>
                                        <p class="text-muted">
                                            Growth</p>
                                    
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b>
                                        6
                                    </b>
                                        <p class="text-muted">
                                            New Users</p>
                                    
                                    </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>15,152</b>
                                        <p class="text-muted">
                                            Profit</p>
                                    </a>
                                </div>
                                <div class="btn-box-row row-fluid">
                                    <div class="span8">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><img src="{{ asset('backend_assets/images/html.jpg') }}"><b>HTML</b>
                                                </a><a href="#" class="btn-box small span4"><img src="{{ asset('backend_assets/images/php.png') }}"><b>PHP</b>
                                                </a><a href="#" class="btn-box small span4"><img src="{{ asset('backend_assets/images/java.png') }}"><b>JAVA</b>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <a href="#" class="btn-box small span4"><img src="{{ asset('backend_assets/images/css.jpg') }}"><b>CSS</b>
                                                </a>
                                                </a><a href="#" class="btn-box small span4"><img src="{{ asset('backend_assets/images/cpp.png') }}"><b>C++</b> </a>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="widget widget-usage unstyled span4">
                                        <li>
                                            <p>
                                                <strong>HTML</strong> <span class="pull-right small muted">78%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: 78%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>PHP</strong> <span class="pull-right small muted">56%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-success" style="width: 56%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>JAVA</strong> <span class="pull-right small muted">44%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-warning" style="width: 44%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>CSS</strong> <span class="pull-right small muted">67%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar bar-danger" style="width: 67%;">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                <strong>C++</strong> <span class="pull-right small muted">78%</span>
                                            </p>
                                            <div class="progress tight">
                                                <div class="bar" style="width: 78%;">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
</div>
                 
@endsection