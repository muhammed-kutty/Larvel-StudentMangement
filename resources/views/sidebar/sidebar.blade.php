<nav id="sidebar" class="sidebar js-sidebar">


    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('home')}}">
  <span class="align-middle"><strong>StudentManagementApp</strong></span>
</a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('home')}}">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
            </li>

            <li class="sidebar-item  {{ request()->routeIs('student.home') ? 'active' : '' }}">
                <a class="sidebar-link"  href="{{route('student.home')}}">
      <i class="align-middle" data-feather="user"></i> <span class="align-middle">Students</span>
    </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('teacher.home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('teacher.home')}}">
      <i class="align-middle" data-feather="user"></i> <span class="align-middle">Teacher</span>
    </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('course.home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('course.home')}}">
      <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Courses</span>
    </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('batches.home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('batches.home')}}">
      <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Batches</span>
    </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('entrollment.home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route("entrollment.home")}}">
      <i class="align-middle" data-feather="book"></i> <span class="align-middle">Entrolment</span>
    </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('payment.home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{route('payment.home')}}">
      <i class="align-middle" data-feather="book"></i> <span class="align-middle">Payment</span>
    </a>
            </li>
            @if (session('user') && session('user')->role == 'admin')
            <li class="sidebar-item {{ request()->routeIs('user.home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('user.home') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Users</span>
                </a>
            </li>
        @endif
        </ul>

     
    </div>
</nav>
