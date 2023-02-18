<?php session_start();
//header("Refresh: $sec; url=$page");
?>
@extends('layouts.app')

@section('content')
@if (!isset($_SESSION['pageAdm'])) 
   <?php $_SESSION['pageAdm']='doi'; ?>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card mt-3">
                <div class="card-header card-header-dashboard"><h1><strong>{{ __('Panou de control aplicatie de livrare') }}</strong></h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('statusErr'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('statusErr') }}
                        </div>
                    @endif

                   <div class="loginRoleMessage mt-3"> {{ __("Sunteti logat cu rol de ")}}
                        <span class="loginRoleText"><strong>{{$role}}</strong></span> {{__("!") }}
                    </div>

                    @if (($role==='administrator')||($role==='restaurant')||($role==='sofer'))
                    <!--continua-->
                             
                             @if ($role==='administrator')
                             <!--continua ca a-->
                             @include('partiale/home-administrator', ['comenzi'=>$comenzi, 'usersNoRole'=>$usersNoRole])  <!--nu cream ruta sa nu fie accesata separat-->
                             @endif

                             @if ($role==='restaurant')
                             <!--continua ca r-->
                             @include('partiale/home-restaurant', ['comenzi'=>$comenzi])    <!--nu cream ruta sa nu fie accesata separat-->
                             @endif

                             @if ($role==='sofer')
                             <!--continua ca s-->
                             @include('partiale/home-sofer', ['comenziSofer'=>$comenzi, 'comenziNoi'=>$comenziNoi, 'comenziFinalizateSofer'=>$comenziFinalizateSofer])       <!--nu cream ruta sa nu fie accesata separat-->
                             @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
