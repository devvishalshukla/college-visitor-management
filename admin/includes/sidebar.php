
 <!-- Sidebar -->
    <div class="bg-light border-right display-screen" id="sidebar-wrapper">
      <div class="sidebar-heading">Gate Pass </div>
      <div class="list-group list-group-flush">
        
        <a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        
         <ul class="nav flex-column flex-nowrap overflow-hidden">
                <li class="nav-item">
                    <a class="nav-link collapsed list-group-item list-group-item-action bg-light" href="#submenu1" data-toggle="collapse" data-target="#submenu1">Employee</a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item"><a class="nav-link py-02 list-group-item list-group-item-action bg-light" href="addEmployee.php"><span>Add New Employee</span></a></li>
                            <li class="nav-item"><a class="nav-link py-2 list-group-item list-group-item-action bg-light" href="manageEmployee.php"><span>Manage Employees</span></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        <a href="report.php" class="list-group-item list-group-item-action bg-light">Report b/w Dates</a>
        <a href="includes/logout.php?log" class="list-group-item list-group-item-action bg-light">Log out</a>

      </div>
    </div>
