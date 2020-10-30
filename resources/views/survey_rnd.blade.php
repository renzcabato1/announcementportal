@extends('layouts.app2')
@section('content')
<!-- Page Content -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
        <div class="d-flex order-0">
            <span class=""  id="menu-toggle"><span class='dashboard'>Survey</span></span>
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
    <div class="container-fluid">
        <form method='POST' action='survey-add' enctype="multipart/form-data" onsubmit='return validation(); show();' >
            {{ csrf_field() }}
            <div class='row'>
                <div class='col-md-12 text-center'>
                    <h3>Sensory Panelist Screening for Snacks</h3>
                </div>
            </div>
            
            <div class='row mt-2 overflow-auto' id='all' style='max-height:85vh'>
                
                <div class='col-md-3'>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <select id ='company' name='company' class="form-control" required>
                            <option value=''>Company Name</option>
                            @foreach($companies as $company)
                            <option value='{{$company->name}}'>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select id ='department' name='department' class="form-control" required>
                            <option value=''>Department Name</option>
                            @foreach($departments as $dept)
                            <option value='{{$dept->name}}'>{{$dept->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class="form-group">
                        <label for="company">Location</label>
                        <select id ='company' name='location' class="form-control" required>
                            <option value=''>Location</option>
                            <option name='BGC' >BGC</option>
                            <option name='MANILA'>MANILA</option>
                            <option name='VISAYAS'>VISAYAS</option>
                            <option name='MINDANAO'>MINDANAO</option>
                        </select>
                    </div>
                </div>
                <div class='col-md-12'>
                    1. Do you regularly take morning and/or afternoon snacks at home?<br>
                    <input type='hidden' value='Do you regularly take morning and/or afternoon snacks at home?' name='question[1]'>
                    <div class="form-check  ml-5">
                        <input class="form-check-input  " type="radio" name="answer[1]" id="answer1" value="Yes" required>
                        <label class="form-check-label" for="answer1">Yes</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input  " type="radio" name="answer[1]" id="answer2" value="No" required>
                        <label class="form-check-label" for="answer2">No</label>
                    </div>
                </div>
                <div class='col-md-12'>
                    2. Do you regularly take morning and/or afternoon snacks at work?<br>
                    <input type='hidden' value='Do you regularly take morning and/or afternoon snacks at work?' name='question[2]'>
                    <div class="form-check  ml-5">
                        <input class="form-check-input" type="radio" name="answer[2]" id="two_a" value="Yes" required>
                        <label class="form-check-label" for="two_a">Yes</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input" type="radio" name="answer[2]" id="two_b" value="No" >
                        <label class="form-check-label" for="two_b">No</label>
                    </div>
                </div>
                <div class='col-md-12 number-three'>
                    3.What type of snacks do you usually eat/prepare? (choose 2 items) <span id='error_three' style='color:red'></span><br>
                    <input type='hidden' value='What type of snacks do you usually eat/prepare?' name='question[3]'>
                    <div class="form-check  ml-5">
                        <input class="form-check-input number-three" type="checkbox"  name="answer[3][]" id="three_a" value="breads/cakes/pastry"  >
                        <label class="form-check-label" for="three_a">breads/cakes/pastry</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input number-three" type="checkbox" name="answer[3][]" id="three_b" value="junk foods"  >
                        <label class="form-check-label" for="three_b">junk foods</label>
                    </div>
                    <div class="form-check  ml-5">  
                        <input class="form-check-input number-three" type="checkbox" name="answer[3][]" id="three_c" value="fast foods"  >
                        <label class="form-check-label" for="three_c">fast foods</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input number-three" type="checkbox" name="answer[3][]" id="three_d" value="rice meals"  >
                        <label class="form-check-label" for="three_d">rice meals</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input number-three" type="checkbox" name="answer[3][]" id="three_e" value="pasta"  >
                        <label class="form-check-label" for="three_e">pasta</label>
                    </div>
                </div>
                <div class='col-md-12'>
                    4. Do you own a microwave oven at home?<br>
                    <input type='hidden' value='Do you own a microwave oven at home?' name='question[4]'>
                    <div class="form-check  ml-5">
                        <input class="form-check-input " type="radio"  name="answer[4]" id="four_a" value="Yes"  required>
                        <label class="form-check-label" for="four_a">Yes</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input " type="radio"  name="answer[4]" id="four_a" value="No"  required>
                        <label class="form-check-label" for="four_a">No</label>
                    </div>
                    
                </div>
                <div class='col-md-12'>
                    5. Do you buy microwavable meals in convenience stores such as 7-Eleven and Ministop?
                    <input type='hidden' value='Do you buy microwavable meals in convenience stores such as 7-Eleven and Ministop?' name='question[5]'>
                    <div class="form-check  ml-5">
                        <input class="form-check-input " type="radio"  name="answer[5]" id="five_yes" value="Yes"  required>
                        <label class="form-check-label" for="five_yes">Yes</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input " type="radio" name="answer[5]" id="five_no" value="No"  >
                        <label class="form-check-label" for="five_no">No</label>
                    </div>
                </div>
                <div class='col-md-12'>
                    6. Are you willing to participate to a sensory evaluation of a product where you will prepare the item via microwave oven (can be done at work or at home)?
                    <input type='hidden' value='Are you willing to participate to a sensory evaluation of a product where you will prepare the item via microwave oven (can be done at work or at home)?' name='question[6]'>
                    <div class="form-check  ml-5">
                        <input class="form-check-input " type="radio"  name="answer[6]" id="six_yes" value="Yes"  required>
                        <label class="form-check-label" for="six_yes">Yes</label>
                    </div>
                    <div class="form-check  ml-5">
                        <input class="form-check-input " type="radio" name="answer[6]" id="six_no" value="No"  >
                        <label class="form-check-label" for="six_no">No</label>
                    </div>
                </div>
            </div>
            <button type="submit"  class="btn btn-success" >Submit</button>
        </form>
    </div>
</div>
</div>
</div>
<script >
    var limit = 2;
    
    $('.number-three').on('change', function(evt) {  
        if($('input[type="checkbox"]:checked.number-three').length > limit) {
            this.checked = false;
        }
    });
    
    function validation()
    {
        var three = $("input[name='answer[3][]']:checked").length;
        
        if(three < 2)
        {
            document.getElementById("error_three").innerHTML = "Please Pick 2!";
            return false;
        }
        
        document.getElementById("myDiv").style.display="block";
        
    }
</script>
@endsection
