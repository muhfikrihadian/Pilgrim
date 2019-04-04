@extends('layouts.admin-app')

@section('content')
<div class="row">
    <div class="col l3">
      <ul id="slide-out" class="side-nav fixed leftside">
        <li><a href="{{route('admin')}}"><i class="material-icons">home</i>Dashboard</a></li>
        <li><a href="{{route('admin.add')}}"><i class="material-icons">group_add</i>Add Admin</a></li>
        <li><a href="{{route('admin.recentjobs')}}"><i class="material-icons">refresh</i>Recent Jobs</a></li>
        <li><a href="{{route('admin.active')}}"><i class="material-icons">work</i>Active Jobs</a></li>
        <li><a href="{{route('admin.applicants')}}"><i class="material-icons">recent_actors</i>Job Seekers</a></li>
        <li><a href="{{route('admin.employers')}}"><i class="material-icons">contacts</i>Employers</a></li>
        <li><a href="{{route('admin.companies')}}"><i class="material-icons">account_balance</i>Companies</a></li>
        <li><a href="{{route('admin.settings')}}"><i class="material-icons">settings</i>Settings</a></li>
    </ul>
</div>

<div class="col l9 s12">
  <div class="row">
    <div class="col l12 s12">
      <h5>Tampilkan Berdasarkan :</h5>
      <select name="selectdata" id="selectdata" onchange='showData(this)' class="browser-default dropdon">
        <option value="" disabled selected>Pilih</option>
        <option value="day">Daily</option>
        <option value="month">Monthly</option>
        <option value="year">Yearly</option>
    </select>
    <div class="static">
        <canvas id="graph_data"></canvas>
    </div>
</div>
<div class="col l5 offset-l1 s12 m6">
  <a href="applicants.html">
    <div class="card">
      <div class="card-image">
          <img src="{{ asset('image/admin/Logo1.jpg') }}">
          <span class="card-title">{{ $seekerCount }} Applicants</span>
      </div>
  </div>
</a>
</div>



<div class="col l5 s12 m6">
  <a href="companies.html">
    <div class="card">
      <div class="card-image">
        <img src="{{ asset('image/admin/Logo2.jpg') }}">
        <span class="card-title">{{ $companies }} Companies</span></a>
    </div>
</div>
</div>
</a>
</div>


<div class="row">
    <div class="col l5 offset-l1 s12 m6">
      <a href="activejobs.html">
        <div class="card">
            <div class="card-image">
            <img src="{{ asset('image/admin/Logo3.jpg') }}">
            <span class="card-title">{{ $vacancy_all }} Jobs</span>
        </div>
    </div>
</a>
</div>


<div class="col l5 s12 m6">
  <a href="recentjobs.html">
    <div class="card">
      <div class="card-image">
        <img src="{{ asset('image/admin/Logo4.jpg') }}">
        <span class="card-title">{{ $vacancy_recent }} Recent Jobs</span>
    </div>
</div>
</a>
</div>

</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.min.js"></script>
<script type='text/javascript'>
  function showData(time_type) {
    if(time_type.options[time_type.selectedIndex].value === "month") {
      var months = [
        "Januari",
        "Pebruari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
      ];
      var applicants = [
        <?php echo $applicant_month[0]->january ?>,
        <?php echo $applicant_month[0]->february ?>,
        <?php echo $applicant_month[0]->march ?>,
        <?php echo $applicant_month[0]->april ?>,
        <?php echo $applicant_month[0]->may ?>,
        <?php echo $applicant_month[0]->june ?>,
        <?php echo $applicant_month[0]->july ?>,
        <?php echo $applicant_month[0]->august ?>,
        <?php echo $applicant_month[0]->september ?>,
        <?php echo $applicant_month[0]->october ?>,
        <?php echo $applicant_month[0]->november ?>,
        <?php echo $applicant_month[0]->december ?>
      ];

      var jobs = [
        <?php echo $jobs_month[0]->january ?>,
        <?php echo $jobs_month[0]->february ?>,
        <?php echo $jobs_month[0]->march ?>,
        <?php echo $jobs_month[0]->april ?>,
        <?php echo $jobs_month[0]->may ?>,
        <?php echo $jobs_month[0]->june ?>,
        <?php echo $jobs_month[0]->july ?>,
        <?php echo $jobs_month[0]->august ?>,
        <?php echo $jobs_month[0]->september ?>,
        <?php echo $jobs_month[0]->october ?>,
        <?php echo $jobs_month[0]->november ?>,
        <?php echo $jobs_month[0]->december ?>
      ];
      var companies = [
        <?php echo $companies_month[0]->january ?>,
        <?php echo $companies_month[0]->february ?>,
        <?php echo $companies_month[0]->march ?>,
        <?php echo $companies_month[0]->april ?>,
        <?php echo $companies_month[0]->may ?>,
        <?php echo $companies_month[0]->june ?>,
        <?php echo $companies_month[0]->july ?>,
        <?php echo $companies_month[0]->august ?>,
        <?php echo $companies_month[0]->september ?>,
        <?php echo $companies_month[0]->october ?>,
        <?php echo $companies_month[0]->november ?>,
        <?php echo $companies_month[0]->december ?>
      ];

      var ctx = document.getElementById("graph_data");
      var months = new Chart(ctx, {
        type: 'line',
        data: {
          labels: months,
          datasets: [
          { 
            data: applicants,
            label: "Applicants",
            borderColor: "#002b5e",
            fill: false
          },
          { 
            data: jobs,
            label: "Jobs",
            borderColor: "#eb7c10",
            fill: false
          },
          { 
            data: companies,
            label: "Companies",
            borderColor: "#47957d",
            fill: false
          }
          ]
        }
      });
    }    
    else if(time_type.options[time_type.selectedIndex].value === "year") {
      var years = [
        <?php echo date('Y', strtotime('-6 year')) ?>,
        <?php echo date('Y', strtotime('-5 year')) ?>,
        <?php echo date('Y', strtotime('-4 year')) ?>,
        <?php echo date('Y', strtotime('-3 year')) ?>,
        <?php echo date('Y', strtotime('-2 year')) ?>,
        <?php echo date('Y', strtotime('-1 year')) ?>,
        <?php echo date('Y') ?>,        
      ];
      var applicants = [
        <?php echo $applicant_year[0]->year1 ?>,
        <?php echo $applicant_year[0]->year2 ?>,
        <?php echo $applicant_year[0]->year3 ?>,
        <?php echo $applicant_year[0]->year4 ?>,
        <?php echo $applicant_year[0]->year5 ?>,
        <?php echo $applicant_year[0]->year6 ?>,
        <?php echo $applicant_year[0]->year7 ?>,        
      ];

      var jobs = [
        <?php echo $jobs_year[0]->year1 ?>,
        <?php echo $jobs_year[0]->year2 ?>,
        <?php echo $jobs_year[0]->year3 ?>,
        <?php echo $jobs_year[0]->year4 ?>,
        <?php echo $jobs_year[0]->year5 ?>,
        <?php echo $jobs_year[0]->year6 ?>,
        <?php echo $jobs_year[0]->year7 ?>,
      ];
      var companies = [
        <?php echo $companies_year[0]->year1 ?>,
        <?php echo $companies_year[0]->year2 ?>,
        <?php echo $companies_year[0]->year3 ?>,
        <?php echo $companies_year[0]->year4 ?>,
        <?php echo $companies_year[0]->year5 ?>,
        <?php echo $companies_year[0]->year6 ?>,
        <?php echo $companies_year[0]->year7 ?>,        
      ];

      var ctx = document.getElementById("graph_data");
      var yearly = new Chart(ctx, {
        type: 'line',
        data: {
          labels: years,
          datasets: [
          { 
            data: applicants,
            label: "Applicants",
            borderColor: "#002b5e",
            fill: false
          },
          { 
            data: jobs,
            label: "Jobs",
            borderColor: "#eb7c10",
            fill: false
          },
          { 
            data: companies,
            label: "Companies",
            borderColor: "#47957d",
            fill: false
          }
          ]
        }
      });
    }
    else if(time_type.options[time_type.selectedIndex].value === "day") {
      var days = [
        <?php echo $days[0]->day1; ?>,
        <?php echo $days[0]->day2; ?>,
        <?php echo $days[0]->day3; ?>,
        <?php echo $days[0]->day4; ?>,
        <?php echo $days[0]->day5; ?>,
        <?php echo $days[0]->day6; ?>,
        <?php echo $days[0]->day7; ?>,        
      ];
      var applicants = [
        <?php echo $applicant_day[0]->day1 ?>,
        <?php echo $applicant_day[0]->day2 ?>,
        <?php echo $applicant_day[0]->day3 ?>,
        <?php echo $applicant_day[0]->day4 ?>,
        <?php echo $applicant_day[0]->day5 ?>,
        <?php echo $applicant_day[0]->day6 ?>,
        <?php echo $applicant_day[0]->day7 ?>,        
      ];

      var jobs = [
        <?php echo $jobs_day[0]->day1 ?>,
        <?php echo $jobs_day[0]->day2 ?>,
        <?php echo $jobs_day[0]->day3 ?>,
        <?php echo $jobs_day[0]->day4 ?>,
        <?php echo $jobs_day[0]->day5 ?>,
        <?php echo $jobs_day[0]->day6 ?>,
        <?php echo $jobs_day[0]->day7 ?>,
      ];
      var companies = [
        <?php echo $companies_day[0]->day1 ?>,
        <?php echo $companies_day[0]->day2 ?>,
        <?php echo $companies_day[0]->day3 ?>,
        <?php echo $companies_day[0]->day4 ?>,
        <?php echo $companies_day[0]->day5 ?>,
        <?php echo $companies_day[0]->day6 ?>,
        <?php echo $companies_day[0]->day7 ?>,        
      ];

      var ctx = document.getElementById("graph_data");
      var daily = new Chart(ctx, {
        type: 'line',
        data: {
          labels: days,
          datasets: [
          { 
            data: applicants,
            label: "Applicants",
            borderColor: "#002b5e",
            fill: false
          },
          { 
            data: jobs,
            label: "Jobs",
            borderColor: "#eb7c10",
            fill: false
          },
          { 
            data: companies,
            label: "Companies",
            borderColor: "#47957d",
            fill: false
          }
          ]
        }
      });
    }    
  }  

  var days = [
    <?php echo $days[0]->day1; ?>,
    <?php echo $days[0]->day2; ?>,
    <?php echo $days[0]->day3; ?>,
    <?php echo $days[0]->day4; ?>,
    <?php echo $days[0]->day5; ?>,
    <?php echo $days[0]->day6; ?>,
    <?php echo $days[0]->day7; ?>,        
  ];
  var applicants = [
    <?php echo $applicant_day[0]->day1 ?>,
    <?php echo $applicant_day[0]->day2 ?>,
    <?php echo $applicant_day[0]->day3 ?>,
    <?php echo $applicant_day[0]->day4 ?>,
    <?php echo $applicant_day[0]->day5 ?>,
    <?php echo $applicant_day[0]->day6 ?>,
    <?php echo $applicant_day[0]->day7 ?>,        
  ];

  var jobs = [
    <?php echo $jobs_day[0]->day1 ?>,
    <?php echo $jobs_day[0]->day2 ?>,
    <?php echo $jobs_day[0]->day3 ?>,
    <?php echo $jobs_day[0]->day4 ?>,
    <?php echo $jobs_day[0]->day5 ?>,
    <?php echo $jobs_day[0]->day6 ?>,
    <?php echo $jobs_day[0]->day7 ?>,
  ];
  var companies = [
    <?php echo $companies_day[0]->day1 ?>,
    <?php echo $companies_day[0]->day2 ?>,
    <?php echo $companies_day[0]->day3 ?>,
    <?php echo $companies_day[0]->day4 ?>,
    <?php echo $companies_day[0]->day5 ?>,
    <?php echo $companies_day[0]->day6 ?>,
    <?php echo $companies_day[0]->day7 ?>,        
  ];

  var ctx = document.getElementById("graph_data");
  var yearly = new Chart(ctx, {
    type: 'line',
    data: {
      labels: days,
      datasets: [
      { 
        data: applicants,
        label: "Applicants",
        borderColor: "#002b5e",
        fill: false
      },
      { 
        data: jobs,
        label: "Jobs",
        borderColor: "#eb7c10",
        fill: false
      },
      { 
        data: companies,
        label: "Companies",
        borderColor: "#47957d",
        fill: false
      }
      ]
    }
  });
</script>
@endsection
