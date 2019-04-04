@extends('layouts.seeker-app')
@section('title','- Search Job')
@section('content')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="dashboard-box-body">
                <div class="row">
                    <form method="POST" action="{{ url('search-result') }}">
                        {{ csrf_field() }}
                        
                        <div class="input-field col s12 m12 offset-l1 l4">
                            <select multiple name="search_position">
                                <option value="" disabled selected>Specialization</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="Full Stack Developer">Full Stack Developer</option>
                                <option value="Mobile Enginering">Mobile Enginering</option>
                                <option value="UI / UX Designer">UI / UX Designer</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m12 l4">
                            <select  multiple name="search_type">
                                <option value="" disabled selected>Types</option>
                                <option value="Internship">Internship</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Contract">Contract</option>
                                <option value="Remote">Remote</option>
                                <option value="Project Based">Project Based</option>
                            </select>
                        </div>
                        <button type="submit" class="col s12 m12 l2 btn btn-round waves-effect waves-light arkademy-orange-background" style="margin-top: 25px;">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="dashboard-box-body">
                <div class="row">
                    @if(isset($vacancies))
                        @foreach($vacancies as $vacancy)
                            @if(isset($web))
                                @foreach($web as $companyWeb)                                                
                                    <div class="col l3 s12">
                                        <div class="card medium">
                                            <div class="card-image">
                                                <img src="{{ url('image/company/'.$vacancy->banner_image) }}" class="card-img">
                                            </div>
                                            <div class="card-content">
                                                <h5><b>{{ $vacancy->job_specialization }}</b></h5>
                                                <p>{{ $companyWeb->web }}<br></p>
                                                <p class="right-align"><b>{{ $vacancy->work_location }}</b><br></p><br>
                                                <dfn>{{ $vacancy->notes }}</dfn>
                                            </div>
                                            <div class="card-action">
                                                <label class="left">{{ $vacancy->created_at }}</label>
                                                <label class="right"><b><a href="{{ route('vacancy-detail', ['id' => $vacancy->unique_id]) }}">Details</a></b></label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else 
                                <div class="col l3 s12">
                                    <div class="card medium">
                                        <div class="card-image">
                                            <img src="{{ url('image/company/'.$vacancy->banner_image) }}" class="card-img">
                                        </div>
                                        <div class="card-content">
                                            <h5><b>{{ $vacancy->job_specialization }}</b></h5>
                                            <p>Tidak ada web<br></p>
                                            <p class="right-align"><b>{{ $vacancy->work_location }}</b><br></p><br>
                                            <dfn>{{ $vacancy->notes }}</dfn>
                                        </div>
                                        <div class="card-action">
                                            <label class="left">15 minutes ago</label>
                                            <label class="right"><a href="{{route('vacancy-detail', ['id' => $vacancy->unique_id])}}">Details</a></label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif                                
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