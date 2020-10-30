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
                    <h3>LFUG-GOC BEVERAGE SURVEY</h3>
                </div>
            </div>
            
            <div class='row mt-2 overflow-auto' id='all' style='max-height:85vh'>
                <div class='col-md-1'>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" min='18' class="form-control" max='80' id="age" name='age' required>
                    </div>
                </div>
                <div class='col-md-2'>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id ='gender' name='gender' class="form-control" required>
                            <option value=''></option>
                            <option name='Male(M)' >Male(M)</option>
                            <option name='Female(F)'>Female(F)</option>
                            <option name='Gender Diverse(D)'>Gender Diverse(D)</option>
                        </select>
                    </div>
                </div>
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
                    </select>
                </div>
            </div>
            <div class='col-md-12'>
                1. What kind of beverage do you prefer?<br>
                <div class="form-check  ml-5">
                    <input class="form-check-input  " type="radio" name="one" id="one_a" value="Hot" required>
                    <label class="form-check-label" for="one_a">Hot</label>
                </div>
                <div class='col-md-11  ml-5'>
                    <div id="hot" class='ml-5' style="display: none;">
                        Do you like coffee, tea or hot chocolate?<br>
                        <div class="form-check  ml-5">
                            <input class="form-check-input" type="radio" name="one_a" id="one_a_a" value="Coffee" >
                            <label class="form-check-label" for="one_a_a">Coffee</label>
                        </div>
                        <div class='col-md-11  ml-5'>
                            <div id="one_coffee" class='ml-5' style="display: none;">
                                Tick which hot coffee best suits your taste<br>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_a" value="3 in 1 Sachet" >
                                    <label class="form-check-label" for="one_coffee_a">3 in 1 Sachet</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_b" value="Americano" >
                                    <label class="form-check-label" for="one_coffee_b">Americano</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_c" value="Cappuccino" >
                                    <label class="form-check-label" for="one_coffee_c">Cappuccino</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_d" value="Machiatto" >
                                    <label class="form-check-label" for="one_coffee_d">Machiatto</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_e" value="Mocha" >
                                    <label class="form-check-label" for="one_coffee_e">Mocha</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_f" value="Latte" >
                                    <label class="form-check-label" for="one_coffee_f">Latte</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_g" value="Espresso" >
                                    <label class="form-check-label" for="one_coffee_g">Espresso</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_h" value="De-caf" >
                                    <label class="form-check-label" for="one_coffee_h">De-caf</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check  ml-5">
                            <input class="form-check-input" type="radio" name="one_a" id="one_b_a" value="Tea" >
                            <label class="form-check-label" for="one_b_a">Tea</label>
                        </div>
                        <div class='col-md-11  ml-5'>
                            <div id="one_tea" class='ml-5' style="display: none;">
                                Tick which hot tea best suits your taste<br>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_a" value="Green" >
                                    <label class="form-check-label" for="one_tea_a">Green</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_b" value="Black" >
                                    <label class="form-check-label" for="one_tea_b">Black</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_c" value="White" >
                                    <label class="form-check-label" for="one_tea_c">White</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_d" value="Jasmine" >
                                    <label class="form-check-label" for="one_tea_d">Jasmine</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_e" value="Oolong" >
                                    <label class="form-check-label" for="one_tea_e">Oolong</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_f" value="Matcha" >
                                    <label class="form-check-label" for="one_tea_f">Matcha</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_tea_g" value="De-Caf" >
                                    <label class="form-check-label" for="one_tea_g">De-Caf</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_coffee_h" value="3 in 1" >
                                    <label class="form-check-label" for="one_coffee_h">3 in 1</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check  ml-5">
                            <input class="form-check-input" type="radio" name="one_a" id="one_c_a" value="Chocolate" >
                            <label class="form-check-label" for="one_c_a">Chocolate</label>
                        </div>
                        <div class='col-md-11  ml-5'>
                            <div id="one_chocolate" class='ml-5' style="display: none;">
                                Tick which hot chocolate best suits your taste<br>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_chocolate_a" value="Hot Dark Chocolate" >
                                    <label class="form-check-label" for="one_chocolate_a">Hot Dark Chocolate</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="one_a_a" id="one_chocolate_b" value="Hot White Chocolate" >
                                    <label class="form-check-label" for="one_chocolate_b">Hot White Chocolate</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input" type="radio" name="one" id="one_b" value="Cold" >
                    <label class="form-check-label" for="one_b">Cold</label>
                </div>
                <div class='col-md-11  ml-5'>
                    <div id="cold" class='ml-5' style="display: none;">
                        Select your choice bellow.<br>
                        <div class="form-check  ml-5">
                            <input class="form-check-input" type="radio" name="two_a" id="two_a_a" value="Coffee-based" >
                            <label class="form-check-label" for="two_a_a">Coffee-based</label>
                        </div>
                        <div class='col-md-11  ml-5'>
                            <div id="two_coffee_based" class='ml-5' style="display: none;">
                                Tick which cold coffee-based beverage best suits your taste(pick 3)<span id='error_coffee_based' style='color:red'></span><br>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input coffee-based" type="checkbox" name="two_coffee_based[]" id="two_coffee_based_a" value="Iced Cafe Americano" >
                                    <label class="form-check-label" for="two_coffee_based_a">Iced Cafe Americano</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input coffee-based" type="checkbox" name="two_coffee_based[]" id="two_coffee_based_b" value="Iced Machiatto" >
                                    <label class="form-check-label" for="two_coffee_based_b">Iced Machiatto</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input coffee-based" type="checkbox" name="two_coffee_based[]" id="two_coffee_based_c" value="Cold Brew" >
                                    <label class="form-check-label" for="two_coffee_based_c">Cold Brew</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input coffee-based" type="checkbox" name="two_coffee_based[]" id="two_coffee_based_d" value="Iced Mocha" >
                                    <label class="form-check-label" for="two_coffee_based_d">Iced Mocha</label>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input coffee-based" type="checkbox" name="two_coffee_based[]" id="two_coffee_based_e" value="Iced Latte" >
                                    <label class="form-check-label" for="two_coffee_based_e">Iced Latte</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check  ml-5">
                            <input class="form-check-input" type="radio" name="two_a" id="two_b_a" value="Non Coffee-based" >
                            <label class="form-check-label" for="two_b_a">Non Coffee-based</label>
                        </div>
                        <div class='col-md-11  ml-5'>
                            <div id="two_non_coffee_based" class='ml-5' style="display: none;">
                                Tick which non coffee-based best suits your taste<br>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="two_non_coffee_based" id="two_non_coffee_based_a" value="Frappe"   >
                                    <label class="form-check-label" for="two_non_coffee_based_a">Frappe</label>
                                </div>
                                <div class='col-md-11  ml-5'>
                                    <div id="frappe_choice" class='ml-5' style="display: none;">
                                        Tick which frappe best suits your taste(pick 3)<span id='error_frappe_choice' style='color:red;'>*</span><br>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_a" value="Strawberries & Creme"  >
                                            <label class="form-check-label" for="frappe_a">Strawberries & Creme</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_b" value="Mocha"   >
                                            <label class="form-check-label" for="frappe_b">Mocha</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_c" value="Green Tea"   >
                                            <label class="form-check-label" for="frappe_c">Green Tea</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_d" value="Java-Chip"   >
                                            <label class="form-check-label" for="frappe_d">Java-Chip</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_e" value="Caramel Machiatto"   >
                                            <label class="form-check-label" for="frappe_e">Caramel Machiatto</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_f" value="Vanila"   >
                                            <label class="form-check-label" for="frappe_f">Vanila</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="frappe_choice[]" id="frappe_g" value="Cinnamon"   >
                                            <label class="form-check-label" for="frappe_g">Cinnamon</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="two_non_coffee_based" id="two_non_coffee_based_b" value="Juices"   >
                                    <label class="form-check-label" for="two_non_coffee_based_b">Juices</label>
                                </div>
                                <div class='col-md-11  ml-5'>
                                    <div id="juice_choice" class='ml-5' style="display: none;">
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input" type="radio" name="juice" id="juice_a" value="Freshly Squeezed"   >
                                            <label class="form-check-label" for="juice_a">Freshly Squeezed</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input" type="radio" name="juice" id="juice_b" value="Bottled"   >
                                            <label class="form-check-label" for="juice_b">Bottled</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input" type="radio" name="juice" id="juice_c" value="Sachet"   >
                                            <label class="form-check-label" for="juice_c">Sachet</label>
                                        </div>
                                    </div>
                                    <div class='col-md-11  ml-5'>
                                        <div id="juice_choice_choice" class='ml-5' style="display: none;">
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="juice_choice" id="juice_choice_a" value="Orange"   >
                                                <label class="form-check-label" for="juice_choice_a">Orange</label>
                                            </div>
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="juice_choice" id="juice_choice_b" value="Pineapple"   >
                                                <label class="form-check-label" for="juice_choice_b">Pineapple</label>
                                            </div>
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="juice_choice" id="juice_choice_c" value="Mango"   >
                                                <label class="form-check-label" for="juice_choice_c">Mango</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="two_non_coffee_based" id="two_non_coffee_based_c" value="Milk Tea"   >
                                    <label class="form-check-label" for="two_non_coffee_based_c">Milk Tea</label>
                                </div>
                                <div class='col-md-11  ml-5'>
                                    <div id="milk_tea_choice" class='ml-5' style="display: none;">
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input" type="radio" name="milk_tea" id="milk_tea_a" value="Sachet"   >
                                            <label class="form-check-label" for="milk_tea_a">Sachet</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input" type="radio" name="milk_tea" id="milk_tea_b" value="Non-Sachet"   >
                                            <label class="form-check-label" for="milk_tea_b">Non-Sachet</label>
                                        </div>
                                    </div>
                                    <div class='col-md-11  ml-5'>
                                        <div id="milk_tea_choice_choice" class='ml-5' style="display: none;">
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="milk_tea_choice" id="milk_tea_choice_a" value="Classic"   >
                                                <label class="form-check-label" for="milk_tea_choice_a">Classic</label>
                                            </div>
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="milk_tea_choice" id="milk_tea_choice_b" value="Chocolate"   >
                                                <label class="form-check-label" for="milk_tea_choice_b">Chocolate</label>
                                            </div>
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="milk_tea_choice" id="milk_tea_choice_c" value="Matcha"   >
                                                <label class="form-check-label" for="milk_tea_choice_c">Matcha</label>
                                            </div>
                                            <div class="form-check  ml-5">
                                                <input class="form-check-input" type="radio" name="milk_tea_choice" id="milk_tea_choice_d" value="Mango"   >
                                                <label class="form-check-label" for="milk_tea_choice_d">Mango</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-check  ml-5">
                                    <input class="form-check-input" type="radio" name="two_non_coffee_based" id="two_non_coffee_based_d" value="Iced Tea"   >
                                    <label class="form-check-label" for="two_non_coffee_based_d">Iced Tea</label>
                                </div>
                                <div class='col-md-11  ml-5'>
                                    <div id="iced_tea_choice" class='ml-5' style="display: none;">
                                        Tick which iced tea best suits your taste(pick 3) <span id='error_iced_tea_choice' style='color:red'></span><br>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="iced_tea_choice[]" id="iced_tea_a" value="Iced Green"   >
                                            <label class="form-check-label" for="iced_tea_a">Iced Green</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="iced_tea_choice[]" id="iced_tea_b" value="Iced Black"   >
                                            <label class="form-check-label" for="iced_tea_b">Iced Black</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="iced_tea_choice[]" id="iced_tea_c" value="Iced White"   >
                                            <label class="form-check-label" for="iced_tea_c">Iced White</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="iced_tea_choice[]" id="iced_tea_d" value="Iced_Jasmine"   >
                                            <label class="form-check-label" for="iced_tea_d">Iced_Jasmine</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="iced_tea_choice[]" id="iced_tea_e" value="Iced Oolong"   >
                                            <label class="form-check-label" for="iced_tea_e">Iced Oolong</label>
                                        </div>
                                        <div class="form-check  ml-5">
                                            <input class="form-check-input coffee-based" type="checkbox" name="iced_tea_choice[]" id="iced_tea_f" value="Iced Matcha"   >
                                            <label class="form-check-label" for="iced_tea_f">Iced Matcha</label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check  ml-5">
                            <input class="form-check-input" type="radio" name="two_a" id="two_c_a" value="Chocolate"   >
                            <label class="form-check-label" for="two_c_a">Chocolate</label>
                        </div>
                        <div id="two_chocolate" class='col-md-11 ml-5' style="display: none;">
                            Tick which cold chocolate best suits your taste<br>
                            <div class="form-check  ml-5">
                                <input class="form-check-input" type="radio" name="two_chocolate" id="two_chocolate_a" value="Iced Dark Chocolate"   >
                                <label class="form-check-label" for="two_chocolate_a">Iced Dark Chocolate</label>
                            </div>
                            <div class="form-check  ml-5">
                                <input class="form-check-input" type="radio" name="two_chocolate" id="two_chocolate_b" value="Iced White Chocolate"   >
                                <label class="form-check-label" for="two_chocolate_b">Iced White Chocolate</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input  " type="radio" name="one" id="one_c" value="both (Hot and Cold)" >
                    <label class="form-check-label" for="one_c">both (Hot and Cold)</label>
                </div>
                <div class='col-md-11  ml-5'>
                    <div id="both" class='ml-5' style="display: none;">
                        Name your top five preferred coffee and tea beverage, be it hot or cold.<br>
                        <div class="form-check col-md-3 ml-5">
                            <div class='p-1'>
                                <input class="form" type="text" name="both_hot_cold[]"  placeholder="1."   >
                            </div>
                            <div class='p-1'>
                                <input class="form" type="text" name="both_hot_cold[]"  placeholder="2."   >
                            </div>
                            <div class='p-1'>
                                <input class="form" type="text" name="both_hot_cold[]"  placeholder="3."   >
                            </div>
                            <div class='p-1'>
                                <input class="form" type="text" name="both_hot_cold[]"  placeholder="4."   >
                            </div>
                            <div class='p-1'>
                                <input class="form" type="text" name="both_hot_cold[]"  placeholder="5."   >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input  " type="radio" name="one" id="one_d" value="3 in 1 Chocolate Powder" >
                    <label class="form-check-label" for="one_d">3 in 1 Chocolate Powder</label>
                </div>
                <div class='col-md-11  ml-5'>
                    <div id="chocolate_powder" class='ml-5' style="display: none;">
                        Select your choice bellow.<br>
                        <div class="form-check  ml-5">
                            <input class="form-check-input  " type="radio" name="two_a" id="three_a_a" value="Ovaltine"   >
                            <label class="form-check-label" for="three_a_a">Ovaltine</label>
                        </div>
                        <div class="form-check  ml-5">
                            <input class="form-check-input  " type="radio" name="two_a" id="three_b_a" value="Milo"   >
                            <label class="form-check-label " for="three_b_a">Milo</label>
                        </div>
                        <div class="form-check  ml-5">
                            <input class="form-check-input  " type="radio" name="two_a" id="three_c_a" value="SwissMiss"   >
                            <label class="form-check-label" for="three_c_a">SwissMiss</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-12'>
                2. If you are to buy your hot and cold drink,  which location suits you best?<br>
                <div class="form-check  ml-5">
                    <input class="form-check-input" type="radio" name="two" id="two_a" value="Within the office" required>
                    <label class="form-check-label" for="two_a">Within the office</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input" type="radio" name="two" id="two_b" value="Within the building" >
                    <label class="form-check-label" for="two_b">Within the building</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input" type="radio" name="two" id="two_c" value="Outside the building" >
                    <label class="form-check-label" for="two_c">Outside the building</label>
                </div>
            </div>
            <div class='col-md-12'>
                3. What influences you to buy coffee? (pick 3) <span id='error_three' style='color:red'></span><br>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox"  name="three[]" id="three_a" value="Packaging"  >
                    <label class="form-check-label" for="three_a">Packaging</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox" name="three[]" id="three_b" value="Brand"  >
                    <label class="form-check-label" for="three_b">Brand</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox" name="three[]" id="three_c" value="Variety of drinks"  >
                    <label class="form-check-label" for="three_c">Variety of drinks</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox" name="three[]" id="three_d" value="Ambiance"  >
                    <label class="form-check-label" for="three_d">Ambiance</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox" name="three[]" id="three_e" value="Experience"  >
                    <label class="form-check-label" for="three_e">Experience</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox" name="three[]" id="three_f" value="Social Media"  >
                    <label class="form-check-label" for="three_f">Social Media</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="checkbox" name="three[]" id="three_g" value="Price"  >
                    <label class="form-check-label" for="three_g">Price</label>
                </div>
            </div>
            <div class='col-md-12'>
                4. What would keep you to continuously patronise your preferred beverage?<br>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio"  name="four" id="four_a" value="Friendly Barista"  required>
                    <label class="form-check-label" for="four_a">Friendly Barista</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio" name="four" id="four_b" value="Price"  >
                    <label class="form-check-label" for="four_b">Price</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio" name="four" id="four_c" value="Variety of drinks"  >
                    <label class="form-check-label" for="four_c">Variety of drinks</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio" name="four" id="four_d" value="Experience"  >
                    <label class="form-check-label" for="four_d">Experience</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio" name="four" id="four_e" value="Taste"  >
                    <label class="form-check-label" for="four_e">Taste</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio" name="four" id="four_f" value="Loyal Offers(similar to Starbucks card & point system of SM advantage cards)"  >
                    <label class="form-check-label" for="four_f">Loyal Offers(similar to Starbucks card & point system of SM advantage cards)</label>
                </div>
            </div>
            <div class='col-md-12'>
                5. Do you believe that advocacy or causes such as supporting a foundation is a good factor for you to make a purchase?<br>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio"  name="five" id="five_yes" value="Yes"  required>
                    <label class="form-check-label" for="five_yes">Yes</label>
                </div>
                <div class="form-check  ml-5">
                    <input class="form-check-input influence" type="radio" name="five" id="five_no" value="No"  >
                    <label class="form-check-label" for="five_no">No</label>
                </div>
                <div class='col-md-11  ml-5'>
                    <div id="support_foundation" class='ml-5' style="display: none;">
                        <div class="form-check col-md-3 ml-5">
                            <div class='p-1'>
                                <input class="form-control" type="text" name="support_foundation_description"  placeholder="Why not ?" >
                            </div>
                        </div>
                    </div>
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
    var limit = 3;
    $("#all :input[name=three]").prop('required',true);
    
    $('.influence').on('change', function(evt) {  
        if($('input[type="checkbox"]:checked.influence').length > limit) {
            this.checked = false;
        }
    });
    $('.coffee-based').on('change', function(evt) {  
        if($('input[type="checkbox"]:checked.coffee-based').length > limit) {
            this.checked = false;
        }
    });
    $('input[type=radio][name=one]').on('change', function() {
        switch ($(this).val()) {
            case 'Hot':
            document.getElementById("hot").style.display = "block";
            document.getElementById("cold").style.display = "None";
            document.getElementById("both").style.display = "None";
            document.getElementById("chocolate_powder").style.display = "None";
            
            $(document).ready(function() {
                $('#cold').find('input:radio').prop('checked', false);
                $('#cold').find('input:checkbox').prop('checked', false);
                $('#both').find('input:text').val('');
                $('#chocolate_powder').find('input:radio').prop('checked', false);
                $("#hot :input").prop('required',false);
                $("#chocolate_powder :input").prop('required',false);
                $("#cold :input").prop('required',false);
                $("#both :input").prop('required',false);
                $("#hot :input[name=one_a]").prop('required',true);
                
            });
            break;
            case 'Cold':
            document.getElementById("hot").style.display = "None";
            document.getElementById("cold").style.display = "block";
            document.getElementById("both").style.display = "None";
            document.getElementById("chocolate_powder").style.display = "None";
            $(document).ready(function() {
                $('#hot').find('input:radio').prop('checked', false);
                $('#both').find('input:text').val('');
                $('#chocolate_powder').find('input:radio').prop('checked', false);
                $("#chocolate_powder :input").prop('required',null);
                $("#hot :input").prop('required',false);
                $("#cold :input").prop('required',false);
                $("#cold input:checkbox").prop('required',false);
                $("#both :input").prop('required',false);
                $("#chocolate_powder :input").prop('required',false);
                $("#cold :input[name=two_a]").prop('required',true);
            });
            break;
            case 'both (Hot and Cold)':
            
            document.getElementById("hot").style.display = "None";
            document.getElementById("cold").style.display = "None";
            document.getElementById("both").style.display = "block";
            document.getElementById("chocolate_powder").style.display = "None";
            $(document).ready(function() {
                $('#cold').find('input:checkbox').prop('checked', false);
                $('#hot').find('input:radio').prop('checked', false);
                $('#chocolate_powder').find('input:radio').prop('checked', false);
                $('#cold').find('input:radio').prop('checked', false);
                $("#chocolate_powder :input").prop('required',false);
                $("#hot :input").prop('required',false);
                $("#cold :input").prop('required',false);
                $("#both :input").prop('required',true);
                $("#chocolate_powder :input").prop('required',false);
            });
            break;
            case '3 in 1 Chocolate Powder':
            document.getElementById("hot").style.display = "None";
            document.getElementById("cold").style.display = "None";
            document.getElementById("both").style.display = "None";
            document.getElementById("chocolate_powder").style.display = "block";
            $('#cold').find('input:checkbox').prop('checked', false);
            $('#hot').find('input:radio').prop('checked', false);
            $('#cold').find('input:radio').prop('checked', false);
            $('#both').find('input:text').val('');
            $("#chocolate_powder :input").prop('required',true);
            $("#hot :input").prop('required',false);
            $("#cold :input").prop('required',false);
            $("#both :input").prop('required',false);
            $("#chocolate_powder :input").prop('required',true);
            break;
        }
    });
    $('input[type=radio][name=one_a]').on('change', function()
    {
        switch ($(this).val()) {
            case 'Coffee':
            document.getElementById("one_coffee").style.display = "block";
            document.getElementById("one_tea").style.display = "none";
            document.getElementById("one_chocolate").style.display = "none";
            $(document).ready(function() {
                $('#one_tea').find('input:radio').prop('checked', false);
                $('#one_chocolate').find('input:radio').prop('checked', false);
                
                $("#one_coffee :input").prop('required',true);
                $("#one_tea :input").prop('required',null);
                $("#one_chocolate :input").prop('required',null);
            });
            break;
            case 'Tea':
            document.getElementById("one_coffee").style.display = "none";
            document.getElementById("one_tea").style.display = "block";
            document.getElementById("one_chocolate").style.display = "none";
            $(document).ready(function() {
                $('#one_coffee').find('input:radio').prop('checked', false);
                $('#one_chocolate').find('input:radio').prop('checked', false);
                
                $("#one_coffee :input").prop('required',null);
                $("#one_tea :input").prop('required',true);
                $("#one_chocolate :input").prop('required',null);
            });
            break;
            case 'Chocolate':
            document.getElementById("one_coffee").style.display = "none";
            document.getElementById("one_tea").style.display = "none";
            document.getElementById("one_chocolate").style.display = "block";
            $(document).ready(function() {
                $('#one_coffee').find('input:radio').prop('checked', false);
                $('#one_tea').find('input:radio').prop('checked', false);
                
                $("#one_coffee :input").prop('required',null);
                $("#one_tea :input").prop('required',null);
                $("#one_chocolate :input").prop('required',true);
            });
            break;
            
        }
    });
    
    $('input[type=radio][name=two_a]').on('change', function()
    {
        switch ($(this).val()) {
            case 'Coffee-based':
            document.getElementById("two_coffee_based").style.display = "block";
            document.getElementById("two_non_coffee_based").style.display = "none";
            document.getElementById("two_chocolate").style.display = "none";
            $(document).ready(function() {
                $('#two_non_coffee_based').find('input:radio').prop('checked', false);
                $('#two_chocolate').find('input:radio').prop('checked', false);
                
                
            });
            break;
            case 'Non Coffee-based':
            document.getElementById("two_coffee_based").style.display = "none";
            document.getElementById("two_non_coffee_based").style.display = "block";
            document.getElementById("two_chocolate").style.display = "none";
            $(document).ready(function() {
                $('#two_coffee_based').find('input:checkbox').prop('checked', false);
                $('#two_chocolate').find('input:radio').prop('checked', false);
            });
            break;
            case 'Chocolate':
            document.getElementById("two_coffee_based").style.display = "none";
            document.getElementById("two_non_coffee_based").style.display = "none";
            document.getElementById("two_chocolate").style.display = "block";
            $(document).ready(function() {
                $('#two_non_coffee_based').find('input:radio').prop('checked', false);
                $('#two_coffee_based').find('input:checkbox').prop('checked', false);
            });
            break;
            
        }
    });
    
    $('input[type=radio][name=two_non_coffee_based]').on('change', function()
    {
        switch ($(this).val()) {
            case 'Frappe':
            document.getElementById("frappe_choice").style.display = "block";
            document.getElementById("juice_choice").style.display = "none";
            document.getElementById("juice_choice_choice").style.display = "none";
            
            document.getElementById("milk_tea_choice").style.display = "none";
            document.getElementById("milk_tea_choice_choice").style.display = "none";
            document.getElementById("iced_tea_choice").style.display = "none";
            $(document).ready(function() {
                $('#iced_tea_choice').find('input:checkbox').prop('checked', false);
                $('#juice_choice').find('input:radio').prop('checked', false);
                $('#juice_choice_choice').find('input:radio').prop('checked', false);
                
                $('#milk_tea_choice').find('input:radio').prop('checked', false);
                $('#milk_tea_choice_choice').find('input:radio').prop('checked', false);
                $("input[name=juice]").prop('required',false);
                $("input[name=juice_choice]").prop('required',false);
                $("input[name=milk_tea]").prop('required',false);
                $("input[name=milk_tea_choice]").prop('required',false);
            });
            break;
            
            case 'Juices':
            document.getElementById("frappe_choice").style.display = "none";
            document.getElementById("juice_choice").style.display = "block";
            
            document.getElementById("milk_tea_choice").style.display = "none";
            document.getElementById("milk_tea_choice_choice").style.display = "none";
            document.getElementById("iced_tea_choice").style.display = "none";
            $(document).ready(function() {
                $('#iced_tea_choice').find('input:checkbox').prop('checked', false);
                $('#frappe_choice').find('input:checkbox').prop('checked', false);
                $('#milk_tea_choice').find('input:radio').prop('checked', false);
                $('#milk_tea_choice_choice').find('input:radio').prop('checked', false);
                $("input[name=juice]").prop('required',true);
                $("input[name=juice_choice]").prop('required',true);
                $("input[name=milk_tea]").prop('required',false);
                $("input[name=milk_tea_choice]").prop('required',false);
            });
            break;
            
            case 'Milk Tea':
            document.getElementById("frappe_choice").style.display = "none";
            document.getElementById("juice_choice").style.display = "none";
            document.getElementById("milk_tea_choice").style.display = "block";
            document.getElementById("juice_choice_choice").style.display = "none";
            
            document.getElementById("iced_tea_choice").style.display = "none";
            $(document).ready(function() {
                $('#iced_tea_choice').find('input:checkbox').prop('checked', false);
                $('#frappe_choice').find('input:checkbox').prop('checked', false);
                $('#juice_choice').find('input:radio').prop('checked', false);
                $('#juice_choice_choice').find('input:radio').prop('checked', false);
                $("input[name=juice]").prop('required',false);
                $("input[name=juice_choice]").prop('required',false);
                $("input[name=milk_tea]").prop('required',true);
                $("input[name=milk_tea_choice]").prop('required',true);
            });
            break;
            
            case 'Iced Tea':
            document.getElementById("frappe_choice").style.display = "none";
            document.getElementById("juice_choice").style.display = "none";
            document.getElementById("juice_choice_choice").style.display = "none";
            document.getElementById("iced_tea_choice").style.display = "block";
            document.getElementById("milk_tea_choice").style.display = "none";
            document.getElementById("milk_tea_choice_choice").style.display = "none";
            $(document).ready(function() {
                $('#juice_choice').find('input:radio').prop('checked', false);
                $('#juice_choice_choice').find('input:radio').prop('checked', false);
                $('#frappe_choice').find('input:checkbox').prop('checked', false);
                $('#milk_tea_choice').find('input:radio').prop('checked', false);
                $('#milk_tea_choice_choice').find('input:radio').prop('checked', false);
                $("input[name=juice]").prop('required',false);
                $("input[name=juice_choice]").prop('required',false);
                $("input[name=milk_tea]").prop('required',false);
                $("input[name=milk_tea_choice]").prop('required',false);
            });
            break;
            
        }
    });
    $('input[type=radio][name=juice]').on('change', function()
    {
        
        document.getElementById("juice_choice_choice").style.display = "block";
    });
    $('input[type=radio][name=milk_tea]').on('change', function()
    {
        
        document.getElementById("milk_tea_choice_choice").style.display = "block";
    });
    $('input[type=radio][name=five]').on('change', function()
    {
        switch ($(this).val()) {
            case 'Yes':
            document.getElementById("support_foundation").style.display = "None";
            
            $('#support_foundation').find('input:text').val('');
            $("input[name=support_foundation_description]").prop('required',false);
            break;
            case 'No':
            $("input[name=support_foundation_description]").prop('required',true);
            document.getElementById("support_foundation").style.display = "Block";
            break;
        }
    });
    function validation()
    {
        var three = $("input[name='three[]']:checked").length;
        
        if(three < 3)
        {
            document.getElementById("error_three").innerHTML = "Please Pick 3!";
            return false;
        }
        
        var two_a = $("input[name=two_a]:checked").val();
        
        if(two_a == "Coffee-based")
        {
            
            var coffee_based = $("input[name='two_coffee_based[]']:checked").length;
            if(coffee_based < 3)
            {
                document.getElementById("error_coffee_based").innerHTML = "Please Pick 3!";
                return false;
            }
        }
        
        var two_non_coffee_based = $("input[name=two_non_coffee_based]:checked").val();
        
        if(two_non_coffee_based == "Frappe")
        {
            
            var frappe_choice = $("input[name='frappe_choice[]']:checked").length;
            if(frappe_choice < 3)
            {
                document.getElementById("error_frappe_choice").innerHTML = "Please Pick 3!";
                return false;
            }
        }
        else if(two_non_coffee_based == "Iced Tea")
        {
            var iced_tea_choice = $("input[name='iced_tea_choice[]']:checked").length;
            if(iced_tea_choice < 3)
            {
                document.getElementById("error_iced_tea_choice").innerHTML = "Please Pick 3!";
                return false;
            }
        }
        
        document.getElementById("myDiv").style.display="block";
        
    }
</script>
@endsection
