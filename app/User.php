<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    protected $connection = 'hr_portal';


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function company(){
        return Employee::join('company_employee', 'employees.id', 'company_employee.employee_id')
            ->join('companies', 'companies.id', 'company_employee.company_id')
            ->where('user_id', Auth::user()->id)
            ->get([
                'companies.id',
                'companies.name',
            ])->first();
    }

    public static function department(){
        return Employee::join('department_employee', 'employees.id', 'department_employee.employee_id')
            ->join('departments', 'departments.id', 'department_employee.department_id')
            ->where('user_id', Auth::user()->id)
            ->get([
                'departments.id',
                'departments.name',
            ])->first();
    }

    public static function resign()
    {
        return UploadPdf::where('user_id','=',Auth::user()->id)
        ->leftJoin('cancel_resignations','upload_pdfs.id','=','cancel_resignations.upload_pdf_id')
        ->leftJoin('letters','upload_pdfs.id','=','letters.upload_pdf_id')
        ->leftJoin('surveys','upload_pdfs.id','=','surveys.upload_pdf_id')
        ->select('upload_pdfs.id as upload_pdfs_id','surveys.id as survey_id','surveys.upload_pdf_id as server_upload_pdf_id','surveys.*','upload_pdfs.*','cancel_resignations.*','letters.id as letters_id','letters.upload_pdf_name as letters_pdf_name','letters.upload_pdf_url as pdf_url')
        ->orderBy('cancel_resignations.id','desc')
        ->orderBy('upload_pdfs.id','desc')
        ->orderBy('letters_id','desc')
        ->where('type','!=','Transfer')
        ->where('cancel','=',null)
        ->first();
    }
    public static function billing()
    {
        return EmployeeAccountability::where('user_id','=',Auth::user()->id)
        ->first();
    }
    public static function employee()
    {
        return Employee::where('user_id',auth()->user()->id)->first();
    }
    
}
