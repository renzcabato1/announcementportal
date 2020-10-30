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
    <form method='POST' action='survey-add' enctype="multipart/form-data" onsubmit='return validation(); show();'>
        {{ csrf_field() }}
        <div  class="container-fluid overflow-auto" style='max-height:85vh'>
            <div class='row'>
                <div class='col-md-12 mt-5 text-center'>
                    <h2><b>Dog Food</b></h2>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 mt-5 text-center'>
                    <h4><i>Good day to all, as you know, one of the products that we are developing from a feeds perspective is our line of pet food particularly Dog Food. For us to be guided more on aspects related to developing this product further, we would like you to please participate in a survey that will be used for the internal UAI study.</i></h4>
                </div>
            </div>
            <div class='row mt-2 overflow-auto' id='all' style='max-height:85vh'>
                
                <div class='col-md-4'>
                    Number of Children :  <br>
                    <input type='hidden' value='Number of Children :' name='question[]'>
                    <input class='form-control col-md-12' name='answer[]' type='number' required>
                </div>
                <div class='col-md-4'>
                    Total number of people in the household:  <br>
                    <input type='hidden' value=' Total number of people in the household:' name='question[]'>
                    <input class='form-control col-md-12' name='answer[]' type='number' required>
                </div>
                <div class='col-md-12'>
                    1.Highest Education Attainment <br>
                    <input type='hidden' value='Highest Education Attainment ' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='High School'>High School</option>
                        <option value='College Graduate'>College Graduate</option>
                        <option value='Masters'>Masters</option>
                        <option value='Doctorate'>Doctorates</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    2. Do you or your household head own the house you are living in? <br>
                    <input type='hidden' value='Do you or your household head own the house you are living in? ' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Own'>Own</option>
                        <option value='Rent'>Rent</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    3.Where do you currently live?  <br>
                    <input type='hidden' value='Where do you currently live?  ' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Subdivision'>Subdivision</option>
                        <option value='Condominium'>Condominium</option>
                        <option value='Bed Space'>Bed Space</option>
                        <option value='Residential House and Lot'>Residential House and Lote</option>
                        <option value='Apartment'>Apartment</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    4.Monthly household income   <br>
                    <input type='hidden' value='Monthly household income ' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='At least Php 190,400'>At least Php 190,400</option>
                        <option value='Between Php 114,240 to Php 190,400'>Between Php 114,240 to Php 190,400</option>
                        <option value='Between  Php 66,640 to Php 114,240'>Between Php 66,640 to Php 114,240</option>
                        <option value='Between Php 38,080 to Php 66,640'>Between Php 38,080 to Php 66,640</option>
                        <option value='Between Php 19,040 to Php 38,080'>Between Php 19,040 to  Php 38,080</option>
                        <option value='Less than Php 9,520'>Less than  Php 9,520</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    5.Are you a dog owner? *                    <br>
                    <input type='hidden' value='Are you a dog owner?  ' name='question[]'>
                    <select class='form-control col-md-3'  onchange='do_survey(this.value)' name='answer[]' required>
                        <option></option>
                        <option value='Yes, Currently a dog owner'>Yes, Currently a dog owner</option>
                        <option value='Yes, Previously a dog owner'> Yes, Previously a dog owner</option>
                        <option value='Never'>Never</option>
                    </select>
                </div>
                <div class='col-md-12' id='number_6' style='display:none'>
                    <div class='col-md-12'>
                        6.Are you feeding them with dry dog food? *        <br>
                        <input type='hidden' value='Are you feeding them with dry dog food? * ' name='question[]'>
                        <select class='form-control col-md-3' onchange='do_survey_seven(this.value)'  name='answer[]' required>
                            <option></option>
                            <option value='Yes'>Yes</option>
                            <option value='No'> No</option>
                        </select>
                    </div>
                </div>
                <div class='col-md-12' id='number_7' style='display:none'>
                <div class='col-md-12'>
                    7. How many dogs do you have? *        <br>
                    <input type='hidden' value='How many dogs do you have? *' name='question[]'>
                    <input class='form-control col-md-3' name='answer[]' type='number' min='1' required>
                </div>
                <div class='col-md-12'>
                    8.What breed of dog/s did you own?    <br>
                    <input type='hidden' value='What breed of dog/s did you own? ' name='question[]'>
                    <input class='form-control col-md-3' name='answer[]' type='text' required>
                </div>
                <div class='col-md-12'>
                    9. What is/are the name/s of your dog/s     <br>
                    <input type='hidden' value='What is/are the name/s of your dog/s' name='question[]'>
                    <input class='form-control col-md-3' name='answer[]' type='text' required>
                </div>
                <div class='col-md-12'>
                    10. Number of years owning a dog?     <br>
                    <input type='hidden' value='Number of years owning a dog? ' name='question[]'>
                    <input class='form-control col-md-3' name='answer[]' type='number' required>
                </div>
                <div class='col-md-12'>
                    11. Did you grow up having a famiy dog? *     <br>
                    <input type='hidden' value='Did you grow up having a famiy dog? *' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Yes'>Yes</option>
                        <option value='No'> No</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    12. For respondent without kids, at what age did you get your dog?     <br>
                    <input type='hidden' value='For respondent without kids, at what age did you get your dog?' name='question[]'>
                    <input class='form-control col-md-3' name='answer[]' type='text' >
                </div>
                <div class='col-md-12'>
                    13. What is your main reason for having a dog? *     <br>
                    <input type='hidden' value='What is your main reason for having a dog? *' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Companionship'>Companionship</option>
                        <option value='Protection (house & kids)'> Protection (house & kids)</option>
                        <option value='To be more active'> To be more active</option>
                        <option value='Manage behavioral problems'>Manage behavioral problems</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    14. What do you prefer to be called? *     <br>
                    <input type='hidden' value='What do you prefer to be called? *' name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Pet Owner'>Pet Owner</option>
                        <option value='Pet Parent'>Pet Parent</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    15. Aside from dog, what other pets you have at home? *    <br>
                    <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'>
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Cat'>Cat</option>
                        <option value='Bird'>Bird</option>
                        <option value='Rabbit'>Rabbit</option>
                        <option value='Fish'>Fish</option>
                        <option value='Rooster'>Rooster</option>
                        <option value='None'>None</option>
                    </select>
                </div>
                <div class='col-md-12'>
                    16. Please rate the following phrases best describe you as dog owner using the legend below *  <br>
                    {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                    a.Do you consider your dog part of the family? <br>
                    <input type='hidden' value='Do you consider your dog part of the family?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   b. Do you often talk to your dog? <br>
                    <input type='hidden' value='b. Do you often talk to your dog?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   c. Do you have more pictures of your pet than other members of the family in you mobile phone? <br>
                    <input type='hidden' value='c. Do you have more pictures of your pet than other members of the family in you mobile phone?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   d. Do you celebrate your dog's birthday? <br>
                    <input type='hidden' value='d. Do you celebrate your dogs birthday?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   e. Do you often buy gifts to your dog? <br>
                    <input type='hidden' value='e. Do you often buy gifts to your dog?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   f. Do you exercise together with your dog? <br>
                    <input type='hidden' value='f. Do you exercise together with your dog?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   g. Do you sleep together with your dog? <br>
                    <input type='hidden' value='g. Do you sleep together with your dog?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   h. Do you often go on vacation with your dog? <br>
                    <input type='hidden' value='h. Do you often go on vacation with your dog?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   i. Do you check first if an establishment is a pet friendly place?<br>
                    <input type='hidden' value='i. Do you check first if an establishment is a pet friendly place?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   j. Will you still own a dog until you are old?<br>
                    <input type='hidden' value='j. Will you still own a dog until you are old?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   k. Do you regularly visit to a vet clinic?<br>
                    <input type='hidden' value='k. Do you regularly visit to a vet clinic?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = very true</option>
                        <option value='3'>3 = quite true</option>
                        <option value='2'>2 = not that much, or</option>
                        <option value='1'>1 = not at all</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   17. When thinking about dog food, what brand/s come to your mind?<br>
                    <input type='hidden' value='When thinking about dog food, what brand/s come to your mind?'  name='question[]'> 
                    <input class='form-control col-md-3' name='answer[]' type='text' required>
              
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   18. Where did you learn about these brands?<br>
                    <input type='hidden' value='Where did you learn about these brands?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='TV'>TV</option>
                        <option value='Radio'>Radio</option>
                        <option value='Newspaper/Magazines'>Newspaper/Magazines</option>
                        <option value='Friends/relatives/neighbors'>Friends/relatives/neighbors</option>
                        <option value='Stores'>Stores</option>
                        <option value='Social Media - Facebook, YouTube, Instagram'>Social Media - Facebook, YouTube, Instagram</option>
                    </select>
              
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   19. Where do you buy dog food most often? *<br>
                    <input type='hidden' value='Where do you buy dog food most often? *'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Local Feed Store'>Local Feed Store</option>
                        <option value='Supermarket'>Supermarket</option>
                        <option value='Pet Clinic'>Pet Clinic</option>
                        <option value='Convenience Store'>Convenience Store</option>
                        <option value='On-Line'>On-Line</option>
                    </select>
              
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   20. How often do you usually buy dog food? *<br>
                    <input type='hidden' value='How often do you usually buy dog food? *'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Every other day'>Every other day</option>
                        <option value='Weekly'>Weekly</option>
                        <option value='Every 2 weeks'>Every 2 weeks</option>
                        <option value='Once a month'>Once a month</option>
                        <option value='Every 2 months'>Every 2 months</option>
                        <option value='Quarterly'>Quarterly</option>
                    </select>
              
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   21. Who buys your dog food?<br>
                    <input type='hidden' value='Who buys your dog food?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Me'>Me</option>
                        <option value='Parents'>Parents</option>
                        <option value='Siblings'>Siblings</option>
                        <option value='House helper'>House helper</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   22. What price per kilo did you pay in our last purchase?<br>
                    <input type='hidden' value='What price per kilo did you pay in our last purchase?'  name='question[]'> 
                    <input class='form-control col-md-3' name='answer[]' type='text' required>
              
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   23. What packaging size do you usually buy? *<br>
                    <input type='hidden' value='What packaging size do you usually buy? *'  name='question[]'> 
                 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='1 kilo'>1 kilo</option>
                        <option value='2 kilos'>2 kilos</option>
                        <option value='3 kilos'>3 kilos</option>
                        <option value='5 kilos'>5 kilos</option>
                        <option value='10 kilos'>10 kilos</option>
                        <option value='20 kilos'>20 kilos</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   24. The last time you bought dog food, do you have a brand in mind?<br>
                    <input type='hidden' value='The last time you bought dog food, do you have a brand in mind?'  name='question[]'> 
                 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Yes'>Yes</option>
                        <option value='No'>No</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   25. What was the brand?<br>
                    <input type='hidden' value='The last time you bought dog food, do you have a brand in mind?'  name='question[]'> 
                    <input class='form-control col-md-3' name='answer[]' type='text' required>
                   
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   26. Did you find that brand in the store you went to?<br>
                    <input type='hidden' value='Did you find that brand in the store you went to?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' onchange='do_number_26(this.value)'  required>
                        <option></option>
                        <option value='Yes'>Yes</option>
                        <option value='No'>No</option>
                    </select>
                </div>
                <div class='col-md-12' id='number_26' style='display:none'>
                    <div class='col-md-12'>
                    {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                    What did you do then? Did you :<br>
                        <input type='hidden' value='What did you do then? Did you :'  name='question[]'> 
                        <select class='form-control col-md-3'  name='answer[]' required>
                            <option></option>
                            <option value='Buy whatever brand was available'>Buy whatever brand was available</option>
                            <option value='Look for the brand in another store'>Look for the brand in another store</option>
                            <option value='Postponed buying until next trip'>Postponed buying until next trip</option>
                        </select>
                    </div>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   27 . What is your monthly budget for dog food?<br>
                    <input type='hidden' value='What is your monthly budget for dog food?'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='At least Php 10,000'>At least ₱10,000</option>
                        <option value='Between Php 5,000 to Php 9,999'>Between ₱5,000 to ₱9,999</option>
                        <option value='Between Php 2,000 to  Php 4,999'>Between ₱2,000 to  ₱4,999</option>
                        <option value='Between Php 1,000 to  Php 1,999'>Between ₱1,000 to  ₱1,999</option>
                        <option value='Below Php 1,000'>Below ₱1,000</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   28 . If our company made dog food, would you buy? *<br>
                    <input type='hidden' value='If our company made dog food, would you buy? *'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' onchange='do_number_28(this.value)' required>
                        <option></option>
                        <option value='Yes'>Yes</option>
                        <option value='Yes'>No</option>
                    </select>
                </div>
                <div class='col-md-12' id='number_28' style='display:none'>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   How many kilos of dog food would you buy every month?*<br>
                    <input type='hidden' value='how many kilos of dog food would you buy every month?*'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='Below 5 kilos'>Below 5 kilos</option>
                        <option value='Between 5-10 kilos'>Between 5-10 kilos</option>
                        <option value='Between 11-20 kilos'>Between 11-20 kilos</option>
                        <option value='Between 21-30 kilos'>Between 21-30 kilos</option>
                        <option value='BBetween 31-50 kilos'>Between 31-50 kilos</option>
                        <option value='50 kilos above'>50 kilos above</option>
                    </select>
                </div>
            </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                   29 . Please rate the following according to how important each of them is to you when you have to choose a dog food brand using the legend below *<br>

                   a.  shiny coat<br>
                    <input type='hidden' value='a.  shiny coat'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   b.  nutritional value<br>
                    <input type='hidden' value='b.  nutritional value'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   c.  tastiness (palatability)<br>
                    <input type='hidden' value='c.  tastiness (palatability)'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   d.  lean muscles<br>
                    <input type='hidden' value='d.  lean muscles'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   e.  freshness<br>
                    <input type='hidden' value='e.  freshness'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   f.  strong immune system<br>
                    <input type='hidden' value='f.  strong immune system'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   g.  cost<br>
                    <input type='hidden' value='g.  cost'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   h.  imported<br>
                    <input type='hidden' value='h.  imported'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   i.   health bones and teeth<br>
                    <input type='hidden' value='i.   health bones and teeth'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
                <div class='col-md-12'>
                   {{-- <input type='hidden' value='Aside from dog, what other pets you have at home? *'  name='question[]'> --}}
                 
                   j.  reduced stool odor<br>
                    <input type='hidden' value='j.  reduced stool odor'  name='question[]'> 
                    <select class='form-control col-md-3'  name='answer[]' required>
                        <option></option>
                        <option value='4'>4 = extremely important</option>
                        <option value='3'>3 = quite important</option>
                        <option value='2'>2 = a little important, or</option>
                        <option value='1'>1 = not that important</option>
                    </select>
                </div>
            </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                <div class="form-group">
                    
                </div>
            </div>
            <div class='col-md-4 text-center'>
                <div class="form-group">
                    
                    <button type="submit"  class="btn btn-success" >Submit</button><br>
                    <span id='error_all' style='color:red'></span>
                </div>
            </div>
            <div class='col-md-4'>
                <div class="form-group">
                    
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function do_survey(value)
    {
        if(value == "Never")
        {

            document.getElementById("number_6").style.display = "none";
            document.getElementById("number_7").style.display = "none";
            $("#number_7 :input").prop('required',null);
            $("#number_6 :input").prop('required',null);
        }
        else
        {
            document.getElementById("number_6").style.display = "block";
            $("#number_6 :input").prop('required',true);
        }
    }
    function do_survey_seven(value)
    {
        if(value == "No")
        {

            document.getElementById("number_7").style.display = "none";
            $("#number_7 :input").prop('required',null);
        }
        else
        {
            document.getElementById("number_7").style.display = "block";
            $("#number_7 :input").prop('required',true);
        }
    }
    function do_number_26(value)
    {
        if(value == "No")
        {

            document.getElementById("number_26").style.display = "block";
            $("#number_26 :input").prop('required',true);
        }
        else
        {
            document.getElementById("number_26").style.display = "none";
            $("#number_26 :input").prop('required',null);
        }
    }
    function do_number_28(value)
    {
        if(value == "No")
        {

            document.getElementById("number_28").style.display = "none";
            $("#number_28 :input").prop('required',null);
        }
        else
        {
            document.getElementById("number_28").style.display = "block";
            $("#number_28 :input").prop('required',true);
        }
    }
</script>
@endsection