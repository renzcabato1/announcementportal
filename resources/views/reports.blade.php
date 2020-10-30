@extends('layouts.app2')
@section('content')
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
        <div class="d-flex order-0">
            <span class=""  id="menu-toggle"><span class='dashboard'>Reports</span></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse justify-content-center order-2" id="navbarSupportedContent" style='color:grey'>
            <ul class="navbar-nav">
                
            </ul>
        </div>
        <span class="navbar-text small text-truncate text-right order-1 order-md-last" style="margin:0px;padding:0px;padding-right:14px;"> <img style='height:30px' src="{{URL::asset('/images/MYPORTAL_logo.png')}}" class='img-fluid' alt="AVATAR" class=''></span>
    </nav>
    
    Count : {{count($reports)}}

    <a id="btnExport" onclick="exportF(this)" class="btn btn-success btn-fill text-white" style='margin-bottom:5px;'>Export to Excel</a><br>
    <table id='reports' border='1' style='margin-top:30px;' width='100%' >
        <tr>
            <td>Name
            </td>
            <td>Company
            </td>
            <td>Department
            </td>
            <td>Position
            </td>
            <td>Location
            </td>
            <td>Q1
            </td>
            <td>Q2
            </td>
            <td>Q3
            </td>
            <td>Total
            </td>
            <td>Q4
            </td>
            <td>Q5
            </td>
            <td>Q6
            </td>
            <td>Total
            {{-- </td>
            <td>Q7
            </td>
            <td>Q8
            </td>
            <td>Q9
            </td>
            <td>Q10
            </td>
            <td>Ave
            </td> --}}
        </tr>
        @foreach($reports as $report)
        <tr>
            <td>{{$report->info->first_name}} {{$report->info->last_name}}
            </td>
            <td>
                {{$report->info->EmployeeCompany[0]->company_abbreviation}}
            </td>
            <td>
                {{$report->info->EmployeeDepartment[0]->name}}
            </td>
            <td>
                {{$report->info->position}}
            </td>
            <td>
                {{$report->info->EmployeeLocation[0]->name}}
            </td>
            <td>
        
                @if($report->surveys[0]->question_answer == $report->surveys[0]->employee_answer)
                @php
                    $point1 = $report->surveys[0]->points;
                @endphp
                @else
                @php
                    $point1 = 0;
                @endphp
                @endif
                {{$point1}}
            </td>
            <td> @if($report->surveys[1]->question_answer == $report->surveys[1]->employee_answer)
                @php
                    $point2 = $report->surveys[1]->points;
                @endphp
                @else
                @php
                    $point2 = 0;
                @endphp
                @endif
                {{$point2}}
            </td>
            <td>@if($report->surveys[2]->question_answer == $report->surveys[2]->employee_answer)
                @php
                    $point3 = $report->surveys[2]->points;
                @endphp
                @else
                @php
                    $point3 = 0;
                @endphp
                @endif
                {{$point3}}
            </td>
            <td>
                {{number_format((($point1 + $point2 + $point3) /10)*100,2)}} %
            </td>
            <td>@if($report->surveys[3]->question_answer == $report->surveys[3]->employee_answer)
                @php
                    $point4 = $report->surveys[3]->points;
                @endphp
                @else
                @php
                    $point4 = 0;
                @endphp
                @endif
                {{$point4}}
            </td>
            <td>@if($report->surveys[4]->question_answer == $report->surveys[4]->employee_answer)
                @php
                    $point5 = $report->surveys[4]->points;
                @endphp
                @else
                @php
                    $point5 = 0;
                @endphp
                @endif
                {{$point5}}
            </td>
            <td>@if($report->surveys[5]->question_answer == $report->surveys[5]->employee_answer)
                @php
                    $point6 = $report->surveys[5]->points;
                @endphp
                @else
                @php
                    $point6 = 0;
                @endphp
                @endif
                {{$point6}}
            </td>
            <td>
                {{-- {{(($point1 + $point2 + $point3+ $point4+ $point5+ $point6) /10)*100}} % --}}
                {{number_format((($point1 + $point2 + $point3+ $point4+ $point5+ $point6) /10)*100,2)}} %
            </td>
            {{-- <td>@if($report->surveys[6]->question_answer == $report->surveys[6]->employee_answer)
                @php
                    $point7 = $report->surveys[6]->points;
                @endphp
                @else
                @php
                    $point7 = 0;
                @endphp
                @endif
                {{$point7}}
            </td>
            <td>@if($report->surveys[7]->question_answer == $report->surveys[7]->employee_answer)
                @php
                    $point8 = $report->surveys[7]->points;
                @endphp
                @else
                @php
                    $point8 = 0;
                @endphp
                @endif
                {{$point8}}
            </td>
            <td>@if($report->surveys[8]->question_answer == $report->surveys[8]->employee_answer)
                @php
                    $point9 = $report->surveys[8]->points;
                @endphp
                @else
                @php
                    $point9 = 0;
                @endphp
                @endif
                {{$point9}}
            </td>
            <td>@if($report->surveys[9]->question_answer == $report->surveys[9]->employee_answer)
                @php
                    $point10 = $report->surveys[9]->points;
                @endphp
                @else
                @php
                    $point10 = 0;
                @endphp
                @endif
                {{$point10}}
            </td>
            <td>  {{number_format((($point7 + $point8 + $point9+ $point10) /4)*100,2)}} %
            </td> --}}
        </tr>
        @endforeach
    </table>
</div>
<script>
    function exportF(elem) {
        // var company_name =  document.getElementById('company_name').innerHTML;  
  
        var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange; var j = 0;
            tab = document.getElementById('reports');//.getElementsByTagName('table'); // id of table
            if (tab==null) {
                return false;
            }
            if (tab.rows.length == 0) {
                return false;
            }
            
            for (j = 0 ; j < tab.rows.length ; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                //tab_text=tab_text+"</tr>";
            }
            
            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
            
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
            
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "reports.csv");
            }
            else                 //other browser not tested on IE 11
            //sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
            try {
                var blob = new Blob([tab_text], { type: "application/vnd.ms-excel" });
                window.URL = window.URL || window.webkitURL;
                link = window.URL.createObjectURL(blob);
                a = document.createElement("a");
                if (document.getElementById("caption")!=null) {
                    a.download=document.getElementById("caption").innerText;
                }
                else
                {
                    a.download =  "reports";
                }
                
                a.href = link;
                
                document.body.appendChild(a);
                
                a.click();
                
                document.body.removeChild(a);
            } catch (e) {
            }
            
            
            return false;
            //return (sa);
        }
    </script>
@endsection