 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="{{ route('home.user') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link " href="{{ route('cuti.create.user') }}">
                 <i class="bi bi-grid"></i>
                 <span>Cuti</span>
             </a>
         </li>



         <li class="nav-item">
             <a class="nav-link " href="{{ route('logout') }}">
                 <i class="bi bi-box-arrow-in-right"></i>
                 <span>Logout</span>
             </a>
         </li>
         <!-- End Dashboard Nav -->
     </ul>

 </aside><!-- End Sidebar-->