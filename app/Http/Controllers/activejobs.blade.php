@extends('layouts.admin-app')

@section('content')

  <div class="row">
    <div class="col l3">
      <ul id="slide-out" class="side-nav fixed leftside">
        <li><a href="index.html"><i class="material-icons">home</i>Dashboard</a></li>
        <li><a href="addadmin.html"><i class="material-icons">group_add</i>Add Admin</a></li>
        <li><a href="recentjobs.html"><i class="material-icons">refresh</i>Recent Jobs</a></li>
        <li><a href="activejobs.html"><i class="material-icons">work</i>Active Jobs</a></li>
        <li><a href="applicants.html"><i class="material-icons">recent_actors</i>Applicants</a></li>
        <li><a href="companies.html"><i class="material-icons">account_balance</i>Companies</a></li>
        <li><a href="settings.html"><i class="material-icons">settings</i>Settings</a></li>
      </ul>
    </div>
    
    <div class="col l9 s12">
      <div class="row margintopdp">
        <form class="col s12">
          <div class="row">
            <div class="input-field col l10 s12 ">
              <input id="icon_prefix" type="text" class="validate">
              <label for="icon_prefix">Nama</label>
            </div>
            <div class="col l2 s2">
              <button class="btn waves-effect waves-light margintopdp" type="submit" name="action">Cari
                <i class="material-icons right">search</i>
              </button>
            </div>
          </div>
        </form>
      </div>
      <ul class="collapsible popout" data-collapsible="accordion">
        <li>
          <div class="collapsible-header l2"><i class="material-icons">work</i>Web Designer
           <span class="badge">Jum'at, 16/03/2018</span>
         </div>
         <div class="collapsible-body">
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <a class="waves-effect waves-light btn">LIHAT</a>
          <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
          <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
        </div>
      </li>
      
      <li>
        <div class="collapsible-header l2"><i class="material-icons">work</i>UX Researcher
         <span class="badge">Jum'at, 16/03/2018</span>
       </div>
       <div class="collapsible-body">
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a class="waves-effect waves-light btn">LIHAT</a>
        <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
        <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
      </div>
    </li>

    <li>
      <div class="collapsible-header l2"><i class="material-icons">work</i>Mobile Developer
       <span class="badge">Jum'at, 16/03/2018</span>
     </div>
     <div class="collapsible-body">
      <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <a class="waves-effect waves-light btn">LIHAT</a>
      <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
      <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
    </div>
  </li>

  <li>
    <div class="collapsible-header l2"><i class="material-icons">work</i>Web Designer
     <span class="badge">Jum'at, 16/03/2018</span>
   </div>
   <div class="collapsible-body">
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <a class="waves-effect waves-light btn">LIHAT</a>
    <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
    <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
  </div>
</li>

<li>
  <div class="collapsible-header l2"><i class="material-icons">work</i>Web Developer
   <span class="badge">Jum'at, 16/03/2018</span>
 </div>
 <div class="collapsible-body">
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <a class="waves-effect waves-light btn">LIHAT</a>
  <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
  <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
</div>
</li>

<li>
  <div class="collapsible-header l2"><i class="material-icons">work</i>UI / UX
   <span class="badge">Kamis, 15/03/2018</span>
 </div>
 <div class="collapsible-body">
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <a class="waves-effect waves-light btn">LIHAT</a>
  <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
  <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
</div>
</li>

<li>
  <div class="collapsible-header l2"><i class="material-icons">work</i>Data Analystic
   <span class="badge">Kamis, 15/03/2018</span>
 </div>
 <div class="collapsible-body">
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <a class="waves-effect waves-light btn">LIHAT</a>
  <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
  <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
</div>
</li>

<li>
  <div class="collapsible-header l2"><i class="material-icons">work</i>Project Management
   <span class="badge">Kamis, 15/03/2018</span>
 </div>
 <div class="collapsible-body">
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <a class="waves-effect waves-light btn">LIHAT</a>
  <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
  <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
</div>
</li>

<li>
  <div class="collapsible-header l2"><i class="material-icons">work</i>Web Designer
   <span class="badge">Kamis, 15/03/2018</span>
 </div>
 <div class="collapsible-body">
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <a class="waves-effect waves-light btn">LIHAT</a>
  <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
  <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
</div>
</li>

<li>
  <div class="collapsible-header l2"><i class="material-icons">work</i>Desktop Developer
   <span class="badge">Kamis, 15/03/2018</span>
 </div>
 <div class="collapsible-body">
  <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <a class="waves-effect waves-light btn">LIHAT</a>
  <a href="#"><img src="Assets/Close.png" class="l1 iconaction marginleftemp"></a>
  <a href="#"><img src="Assets/Agree.png" class="l1 iconaction marginleftsp"></a>
</div>
</li>
</ul>
<ul class="center pagination">
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

@endsection