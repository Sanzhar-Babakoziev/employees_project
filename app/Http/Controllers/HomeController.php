<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Morris;
use App\Employee;
use Illuminate\Database\Query\Builder;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

 



    public function employees()
    {
       
        if($_GET && isset($_GET["search"])) {
             $keyword = $_GET["search"];
             $pages = 1000000;
        } else {
            $keyword = "";
             $pages = 10;
        }


        $employees = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        // ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('employees.first_name','like','%'.$keyword.'%')
        ->orWhere('employees.last_name','like','%'.$keyword.'%')
        // ->groupBy()
        ->paginate($pages);

         $departments = DB::table('departments')->get();

        return view('employees')->with(['employees' => $employees, 'departments'=> $departments]);;
        
    }




    // public function charts()
    // {
    //      $chart = Charts::create('line', 'google')
    //         ->Title('My nice chart')
    //         ->Labels(['First', 'Second', 'Third'])
    //         ->Values([5,10,20])
    //         ->Dimensions(1000,500)
    //         ->Responsive(true);

    //     return view('analysis')->with(['chats' => $chart]);
    // }






    public function search(Request $request){


        $keyword = $request->$_POST["search"];

        $employees = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('employees.first_name','like','%'.$keyword.'%')
        ->orWhere('employees.last_name','like','%'.$keyword.'%')
        // ->groupBy()
        ->paginate(10);

         $departments = DB::table('departments')->get();

        return view('employees')->with(['employees' => $employees, 'departments'=> $departments]);;


        // return $keyword;
    }




     public function sort(Request $request)
    {
        $temp = $request->dept_name;
        // if($sortBy == "ascending"){
            $departments = DB::table('departments')->get();

        // }

        switch ($temp) {
            case 'Customer Service':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Customer Service')
        // ->groupBy()
        ->paginate(10);
                break;

                case 'Development':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Development')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Finance':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Finance')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Human Resources':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Human Resources')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Marketing':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Marketing')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Production':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Production')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Quality Management':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Quality Management')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Research':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Research')
        // ->groupBy()
        ->paginate(10);
                break;

                  case 'Sales':
                $dep_name = DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        ->where('departments.dept_name', '=', 'Sales')
        // ->groupBy()
        ->paginate(10);
                break;

                      

            
            default:
                 $dep_name =DB::table('employees')
        ->join('dept_emp', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->join('titles', 'titles.emp_no', '=' , 'employees.emp_no')
        ->join('dept_manager', 'dept_manager.emp_no', '=' , 'employees.emp_no')
        // ->groupBy()
        ->paginate(10);
                break;


        }

        // return $dep_name;
        return view('employees')->with(['employees' => $dep_name, 'departments'=> $departments]);;
    }


    public function analysis()
    {

        return view('analysis');
    }


    public function getDepartment()
    {
        $departments = DB::table('departments')
        ->select(DB::raw('COUNT(dept_name) as emp'), 'dept_name'
)        ->join('dept_emp', 'dept_emp.dept_no' , '=', 'departments.dept_no')
        // ->where('dept_name', '=' , 'Sales')
        ->groupBy('dept_name')
        ->get();

        return $departments;
    }


    public function maxSal()
    {
        $maxSal = DB::table('salaries')
        ->select(DB::raw('MAX(salary) as salary'), 'emp_no')
        ->where('emp_no', '=', 10001)
        ->orderBy('salary')
        ->groupBy('emp_no')
        ->get();

        return $maxSal;
    }


    public function getHigh(){
        $maxSal = DB::table('salaries')
        // ->join('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
        ->select(DB::raw('MAX(salary) as salary'),'emp_no')
        ->where('salary', '>' , 155000)
        ->groupBy('emp_no')
        ->orderBy('salary')
        ->get();

        return $maxSal;  
    }

    // public function dep_name()
    // {
    //     $departments = DB::table('departments')->get();
    //     return view('employees') ->with(['departments'=> $departments]);
    // }
}
