<div id="view_survey" class="modal fade  text-left" role="dialog" style='font-size:12px;'>
    <div class="modal-dialog modal-lg" style=''>
        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
                <h4 class="modal-title" style='color:black'>Survey</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            {{-- <form  method='POST' action='survey-update/{{auth()->user()->resign()->survey_id}}' enctype="multipart/form-data" onsubmit='show()' > --}}
                <div class="modal-body">
                    {{ csrf_field() }}
                    <table width='100%' border='1'>
                        <tr>
                            <td rowspan='3' width='13%'>
                                <img src='{{ asset('images/front-logo.png')}}' width='80px' style='padding:10px;'>
                            </td>
                            <td colspan='2'>
                                <span style='padding-left:10px'>La Filipina Uy Gongco Group of Companies</span>
                            </td>
                        </tr>
                        <tr style='font-size:12px;' >
                            <td>
                                <span style='padding-left:10px'>  Rev. No. 00</span>
                            </td>
                            <td>
                                Effective date : April 5, 2019
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <span style='padding-left:10px'>  <b>EXIT INTERVIEW FORM</b></span>
                            </td>
                        </tr>
                        
                    </table>
                    <table width='100%' border='1'>
                        <tr align='center' style='color:white;background:#385524;'>
                            <td>
                                EMPLOYEE INFORMATION
                            </td>
                        </tr>
                    </table>
                    <table width='100%' border='1'>
                        <tr >
                            <td>
                                Position Title<br>
                                {{$name->position}}
                            </td>
                            <td>
                                Department<br>
                                {{$name->department_name}}
                            </td>
                            <td>
                                Company<br>
                                {{$name->company_name}}
                            </td>
                        </tr>
                        <tr >
                            <td>
                                Location / Work Site<br>
                                {{$name->location_name}}
                            </td>
                            <td>
                                No. of months / years worked with the company<br>
                                @php
                                $diff = strtotime(date('Y-m-d'))-strtotime($name->date_hired);
                                $year = floor($diff/ (365*60*60*24));
                                $months = floor(($diff - $year * 365*60*60*24) / (30*60*60*24));
                                $diff_birth = strtotime(date('Y-m-d'))-strtotime($name->birthdate);
                                $year_birth = floor($diff_birth/ (365*60*60*24));
                                @endphp
                                {{$year . ' Year/s and '. $months .' Month/s'}}
                            </td>
                            <td>
                                Age<br>
                                {{number_format($year_birth)}}
                            </td>
                        </tr>
                        <tr >
                            <td colspan='3'>
                                
                                Primary reason for leaving:<br>
                                <div class='row'>
                                    <div class='col-md-2'>
                                        <input type='radio' name = 'primary_reason' value='Work Abroad'  {{ ( auth()->user()->resign()->primary_reason == 'Work Abroad') ? 'checked' : '' }} selected required>
                                        Work (abroad)
                                    </div>
                                    <div class='col-md-2'>
                                        <input type='radio' name = 'primary_reason' value='Work (other co.)'  {{ (auth()->user()->resign()->primary_reason == 'Work (other co.)') ? 'checked' : '' }}  required>
                                        Work (other co.)
                                    </div>
                                    <div class='col-md-3'>
                                        <input type='radio' name = 'primary_reason' value='Personal /Family Matter'  {{ ( auth()->user()->resign()->primary_reason == 'Personal /Family Matter') ? 'checked' : '' }}  required>
                                        Personal /Family Matter
                                    </div>
                                    <div class='col-md-3'>
                                        <input type='radio' name = 'primary_reason' value='Migration/Relocation'  {{ ( auth()->user()->resign()->primary_reason == 'Migration/Relocation') ? 'checked' : '' }}  required>
                                        Migration/Relocation
                                    </div>
                                    <div class='col-md-2'>
                                        <input type='radio' name = 'primary_reason' value='Others' {{ ( auth()->user()->resign()->primary_reason == 'Others') ? 'checked' : '' }}  required>
                                        Others
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td colspan='3'>
                                If primary reason is others, please indicate reason:<br>
                                <div class='row'>
                                    <div class='col-md-12'>
                                    <textarea name= 'others_primary' style='width:100%;'>{{auth()->user()->resign()->other_primary}}</textarea>
                                    </div>
                                    
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td colspan='3'>
                                If primary reason is work, please indicate main consideration:<br>
                                <div class='row'>
                                    <div class='col-md-2'>
                                        <input type='radio' name = 'work_reason' value='Salary' {{ ( auth()->user()->resign()->work_reason == 'Salary') ? 'checked' : '' }}  required>
                                        Salary
                                    </div>
                                    <div class='col-md-2'>
                                        <input type='radio' name = 'work_reason' value='Career devt.' {{ ( auth()->user()->resign()->work_reason == 'Career devt.') ? 'checked' : '' }} required>
                                        Career dev't.
                                    </div>
                                    <div class='col-md-3'>
                                        <input type='radio' name = 'work_reason' value='Personal /Family Matter' {{ ( auth()->user()->resign()->work_reason == 'Personal /Family Matter') ? 'checked' : '' }} required>
                                        Personal /Family Matter
                                    </div>
                                    <div class='col-md-3'>
                                        <input type='radio' name = 'work_reason' value='Migration/Relocation' {{ ( auth()->user()->resign()->work_reason == 'Migration/Relocatio') ? 'checked' : '' }} required>
                                        Location
                                    </div>
                                    <div class='col-md-2'>
                                        <input type='radio' name = 'work_reason' value='Others' {{ ( auth()->user()->resign() == 'Others') ? 'checked' : '' }} required>
                                        Others
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr >
                            <td colspan='3'>
                                If primary reason is others, please indicate reason:<br>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <textarea name= 'work_remarks' style='width:100%;'>{{auth()->user()->resign()->work_remarks}}</textarea>
                                    </div>
                                    
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table border='1'>
                        <tr align='center' style='color:white;background:#385524;'>
                            <td >
                                STATEMENTS
                            </td>
                            <td >
                                RATING
                            </td>
                            <td >
                                COMMENTS
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%'   align='left'>
                                1. My immediate superior regularly gives me feedback and coaching.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="1_1">1 Strongly Disagree<br />
                                            <input type='radio' id='1_1' name = 'one' value='1_1' {{ ( auth()->user()->resign()->one == '1_1') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="1_2">2 Disagree<br />
                                            <input type='radio' id='1_2' name = 'one' value='1_2' {{ ( auth()->user()->resign()->one == '1_2') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="1_3">3 Agree<br />
                                            <input type='radio' name = 'one' id='1_3' value='1_3' {{ ( auth()->user()->resign()->one == '1_3') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="1_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'one' id='1_4' value='1_4' {{ ( auth()->user()->resign()->one == '1_4') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_1' style='width:100%;'>{{auth()->user()->resign()->comment_1}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%'  align='left'>
                                2. My team works well together and promotes a harmonious and positive working environment for me.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="2_1">1 Strongly Disagree<br />
                                            <input type='radio' id='2_1' name = 'two' value='2_1' {{ ( auth()->user()->resign()->two == '2_1') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="2_2">2 Disagree<br />
                                            <input type='radio' id='2_2' name = 'two' value='2_2' {{ ( auth()->user()->resign()->two == '2_2') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="2_3">3 Agree<br />
                                            <input type='radio' id='2_3' name = 'two' value='2_3' {{ ( auth()->user()->resign()->two == '2_3') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="2_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'two' id='2_4' value='2_4' {{ ( auth()->user()->resign()->two == '2_4') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_2' style='width:100%;'>{{auth()->user()->resign()->comment_2}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left'>
                                3. My job responsibilities and performance expectations are clear.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="3_1">1 Strongly Disagree<br />
                                            <input type='radio' id='3_1' name = 'three' value='3_1' {{ ( auth()->user()->resign()->three == '3_1') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="3_2">2 Disagree<br />
                                            <input type='radio' id='3_2' name = 'three' id='3_2' {{ ( auth()->user()->resign()->three == '3_2') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="3_3">3 Agree<br />
                                            <input type='radio' id='3_3' name = 'three' value='3_3' {{ ( auth()->user()->resign()->three == '3_3') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="3_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'three' id='3_4' value='3_4' {{ ( auth()->user()->resign()->three == '3_4') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_3' style='width:100%;'>{{auth()->user()->resign()->comment_3}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left'>
                                4. My job responsibilities and performance expectations are clear.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="4_1">1 Strongly Disagree<br />
                                            <input type='radio' id='3_1' name = 'four' value='4_1'  {{ ( auth()->user()->resign()->four == '4_1') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="4_2">2 Disagree<br />
                                            <input type='radio' id='3_2' name = 'four' id='4_2' {{ ( auth()->user()->resign()->four == '4_2') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="4_3">3 Agree<br />
                                            <input type='radio' id='4_3' name = 'four' value='4_3' {{ ( auth()->user()->resign()->four == '4_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="4_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'four' id='4_4' value='4_4' {{ ( auth()->user()->resign()->four == '4_4') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_4' style='width:100%;'>{{auth()->user()->resign()->comment_4}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left' >
                                5. The company provides trainings and other opportunities for learning and development.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="5_1">1 Strongly Disagree<br />
                                            <input type='radio' id='5_1' name = 'fifth' value='5_1' {{ ( auth()->user()->resign()->five == '5_1') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="5_2">2 Disagree<br />
                                            <input type='radio' id='5_2' name = 'fifth' id='5_2'  {{ ( auth()->user()->resign()->five == '5_2') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="5_3">3 Agree<br />
                                            <input type='radio' id='5_3' name = 'fifth' value='5_3'  {{ ( auth()->user()->resign()->five == '5_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="5_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'fifth' id='5_4' value='5_4'  {{ ( auth()->user()->resign()->five == '5_4') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_5' style='width:100%;'>{{auth()->user()->resign()->comment_5}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left'>
                                6. The company's systems and processes are clear and efficient.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="6_1">1 Strongly Disagree<br />
                                            <input type='radio' id='6_1' name = 'six' value='6_1' {{ ( auth()->user()->resign()->six == '6_1') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="6_2">2 Disagree<br />
                                            <input type='radio' id='6_2' name = 'six' id='6_2' {{ ( auth()->user()->resign()->six == '6_2') ? 'checked' : '' }}  required>
                                        </label>_
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="6_3">3 Agree<br />
                                            <input type='radio' id='6_3' name = 'six' value='6_3' {{ ( auth()->user()->resign()->six == '6_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="6_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'six' id='6_4' value='6_4' {{ ( auth()->user()->resign()->six == '6_4') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_6' style='width:100%;'>{{auth()->user()->resign()->comment_6}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left'>
                                7. The company provides a competitive compensation and benefits package.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="7_1">1 Strongly Disagree<br />
                                            <input type='radio' id='7_1' name = 'seven' value='7_1' {{ ( auth()->user()->resign()->seven == '7_1') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="7_2">2 Disagree<br />
                                            <input type='radio' id='7_2' name = 'seven' id='7_2' {{ ( auth()->user()->resign()->seven == '7_2') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="7_3">3 Agree<br />
                                            <input type='radio' id='7_3' name = 'seven' value='7_3' {{ ( auth()->user()->resign()->seven == '7_3') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="7_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'seven' id='7_4' value='7_4' {{ ( auth()->user()->resign()->seven == '7_4') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_7' style='width:100%;'>{{auth()->user()->resign()->comment_7}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left' >
                                8. The company's culture is generally positive.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="8_1">1 Strongly Disagree<br />
                                            <input type='radio' id='8_1' name = 'eight' value='8_1' {{ ( auth()->user()->resign()->eight == '8_1') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="8_2">2 Disagree<br />
                                            <input type='radio' id='8_2' name = 'eight' id='8_2' {{ ( auth()->user()->resign()->eight == '8_2') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="8_3">3 Agree<br />
                                            <input type='radio' id='8_3' name = 'eight' value='8_3' {{ ( auth()->user()->resign()->eight == '8_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="8_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'eight' id='8_4' value='8_4'  {{ ( auth()->user()->resign()->eight == '8_4') ? 'checked' : '' }} required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_8' style='width:100%;'>{{auth()->user()->resign()->comment_8}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left'>
                                9. The company's culture is generally positive.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="9_1">1 Strongly Disagree<br />
                                            <input type='radio' id='9_1' name = 'nine' value='9_1' {{ ( auth()->user()->resign()->nine == '9_1') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="9_2">2 Disagree<br />
                                            <input type='radio' id='9_2' name = 'nine' id='9_2' {{ ( auth()->user()->resign()->nine == '9_2') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="9_3">3 Agree<br />
                                            <input type='radio' id='9_3' name = 'nine' value='9_3' {{ ( auth()->user()->resign()->nine == '9_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="9_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'nine' id='9_4' value='9_4' {{ ( auth()->user()->resign()->nine == '9_4') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_9' style='width:100%;'>{{auth()->user()->resign()->comment_9}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left'>
                                10. The company's leaders display good leadership qualities and expertise in their field.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="10_1">1 Strongly Disagree<br />
                                            <input type='radio' id='10_1' name = 'ten' value='10_1' {{ ( auth()->user()->resign()->ten == '10_1') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="10_2">2 Disagree<br />
                                            <input type='radio' id='10_2' name = 'ten' id='10_2' {{ ( auth()->user()->resign()->ten == '10_2') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="10_3">3 Agree<br />
                                            <input type='radio' id='10_3' name = 'ten' value='10_3' {{ ( auth()->user()->resign()->ten == '10_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="10_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'ten' id='10_4' value='10_4' {{ ( auth()->user()->resign()->ten == '10_4') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_10' style='width:100%;'>{{auth()->user()->resign()->comment_10}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                            <td width='20%' align='left' >
                                11. I am aware of and appreciate the company's engagement programs.
                            </td>
                            <td width='60%'>
                                <div class='row'>
                                    <div class='col-md-4'>
                                        <label for="11_1">1 Strongly Disagree<br />
                                            <input type='radio' id='11_1' name = 'eleven' value='11_1' {{ ( auth()->user()->resign()->eleven == '11_1') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="11_2">2 Disagree<br />
                                            <input type='radio' id='11_2' name = 'eleven' value='11_2' {{ ( auth()->user()->resign()->eleven == '11_2') ? 'checked' : '' }}   required>
                                        </label>
                                    </div>
                                    <div class='col-md-2'>
                                        <label for="11_3">3 Agree<br />
                                            <input type='radio' id='11_3' name = 'eleven' value='11_3' {{ ( auth()->user()->resign()->eleven == '11_3') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    <div class='col-md-3'>
                                        <label for="11_4">4 Strongly Agree<br />
                                            <input type='radio' name = 'eleven' id='11_4' value='11_4' {{ ( auth()->user()->resign()->eleven == '11_4') ? 'checked' : '' }}  required>
                                        </label>
                                    </div>
                                    
                                </div>
                            </td>
                            <td width='20%'>
                                <textarea name='comment_11' style='width:100%;'>{{auth()->user()->resign()->comment_11}}</textarea>
                            </td>
                        </tr>
                        <tr align='center' >
                                <td width='20%' align='left' >
                                    12. I would recommend this company to others exploring career opportunities.
                                </td>
                                <td width='60%'>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <label for="12_1">1 Strongly Disagree<br />
                                                <input type='radio' id='12_1' name = 'twelve' value='12_1' {{ ( auth()->user()->resign()->twelve == '12_1') ? 'checked' : '' }}  required>
                                            </label>
                                        </div>
                                        <div class='col-md-3'>
                                            <label for="12_2">2 Disagree<br />
                                                <input type='radio' id='12_2' name = 'twelve' value='12_2' {{ ( auth()->user()->resign()->twelve == '12_2') ? 'checked' : '' }}  required>
                                            </label>
                                        </div>
                                        <div class='col-md-2'>
                                            <label for="12_3">3 Agree<br />
                                                <input type='radio' id='12_3' name = 'twelve' value='12_3' {{ ( auth()->user()->resign()->twelve == '12_3') ? 'checked' : '' }}  required>
                                            </label>
                                        </div>
                                        <div class='col-md-3'>
                                            <label for="12_4">4 Strongly Agree<br />
                                                <input type='radio' name = 'twelve' id='12_4' value='12_4' {{ ( auth()->user()->resign()->twelve == '12_4') ? 'checked' : '' }}  required>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </td>
                                <td width='20%'>
                                    <textarea name='comment_12' style='width:100%;'>{{auth()->user()->resign()->comment_12}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3'>
                                        Other suggestions for improvement:<br>
                                    <textarea name='other_suggestion' style='width:100%;'>{{auth()->user()->resign()->other_suggestion}}</textarea>
                                </td>
                            </tr>
                            <tr align='center'>
                                <td colspan='3'>
                                        Thank you for your honest feedback. Trust that all your replies shall be treated with outmost confidentiality. Should the results of this survey be reported, responses will be generalized. Respondents will not be identified individually.
                                </td>
                            </tr>
                    </table>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit"  class="btn btn-primary" >Save</button>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>