@extends('layouts.poster-app')
@section('title','- Search Talent')
@section('content')
<?php
    $profile_data = Auth::user()->ArkademyProfile(Auth::user()->email);    
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="dashboard-box-body">
                <div class="row">
                    <form method="POST" action="{{ url('search-result-talent') }}">
                        {{ csrf_field() }}
                        <div class="input-field col s12 m12 l3">
                            <input id="search" type="text" class="validate" placeholder="Search Talent by Specialization..." name="search_position">
                        </div>
                        <div class="input-field col s12 m12 l3">
                            <input id="search-1" type="text" class="validate" placeholder="Search Talent by Skills..." name="search_skills">
                        </div>
                        <div class="input-field col s12 m12 l3">
                            <select  multiple name="search_type">
                                <option value="" disabled selected>All Types</option>
                                <option value="1">Internship</option>
                                <option value="2">Full-time</option>
                                <option value="3">Contract</option>
                                <option value="4">Remote</option>
                                <option value="5">Project Based</option>
                            </select>
                        </div>
                        <button type="submit" class="col s12 m12 l3 btn btn-round waves-effect waves-light arkademy-orange-background" style="margin-top: 25px;">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="dashboard-box-body">
                <div class="row">
                    <div class="col l3 s12">
                        <div class="card medium">
                            <div class="card-image">
                                <img src="#" class="card-img">
                            </div>
                            <div class="card-content">
                                <h5><b>Shabrina Fitri</b></h5>
                                <p>shabrinafitri01@gmail.com<br></p>
                                <p class="right-align"><b>Jakarta</b><br></p><br>
                                <dfn>(TOP 3 BAHASA PEMROGRAMAN)</dfn>
                            </div>
                            <div class="card-action">
                                <label class="left"></label>
                                <label class="right"><a href="#">Details</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="col l3 s12">
                        <div class="card medium">
                            <div class="card-image">
                                <img src="#" class="card-img">
                            </div>
                            <div class="card-content">
                                <h5><b>Shabrina Fitri</b></h5>
                                <p>shabrinafitri01@gmail.com<br></p>
                                <p class="right-align"><b>Jakarta</b><br></p><br>
                                <dfn>(TOP 3 BAHASA PEMROGRAMAN)</dfn>
                            </div>
                            <div class="card-action">
                                <label class="left"></label>
                                <label class="right"><a href="#">Details</a></label>
                            </div>
                        </div>
                    </div>                     
                </div>
                <div class="row">
                    <ul class="pagination">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!">3</a></li>
                        <li class="waves-effect"><a href="#!">4</a></li>
                        <li class="waves-effect"><a href="#!">5</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection