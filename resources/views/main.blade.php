@extends('layout.app')

@section('content')

    <style>


        .kkbk {
            text-align: center;
            margin-top: 2em;
        }

        .kbee {
            background-color: #ffcd00;
            color: #000000;
            padding: 0.5rem 0.8rem;
            border-radius: 30px;
            border: 1px solid #000000;
        }


        .kbee:hover{
            text-decoration: none;
            color: #000000;
        }

        .error{
            text-align: center;
            color: red;
            width: 100%;
        }
		
		.news-rls h5 p {
    font-size: 19px;
}
    </style>


<header>

    <div class="container newbanner-area">
        <div class="row">
            <div class="col-md-7 banner-img-box">
			<div class="lgoleft">
			 <img src="{{ url('/img/Vector-mg.png') }}" alt="" class="logohps">
			 </div>
			 
               
				
				
             <div class="lgoleft bottomars">
			 <img src="{{ url('/img/hpimage.png') }}" alt="" class="logohps">
			 </div>   

            </div>
            <div class="col-md-5 main-form-box">
			<div class="lgoright">
			 <img src="{{ url('/img/fifa.png') }}" alt="" class="logohps bflys">
			</div>
			
			<div class="centerset">
			<div class="newtags">
                    <!--<h5 class="game-on"><span>Squad up to</span><br>  Search and Destroy </h5>
					<p class="sub-white">Showdown on 20th December</p> -->
					<img src="{{ url('/img/showdate.png') }}" class="daterelated">
					<img src="{{ url('/img/rightshomage.png') }}">
                </div>
			<div class="divs-subs new-des">
                    
              <div class="center-adjust">   
<a class="btn register-btn borderless" data-toggle="modal" data-target="#exampleModal" href="javascript:void(0);">
<img src="{{ url('/img/regisforfree.png') }}"> </a>						
                     
					<h6 class="date-banner">
					<img src="{{ url('/img/lastdatereg.png') }}" style="" class="date-parts">
					<p class="tc">*Terms and Conditions Apply</p>
					</h6>
					 
					</div>
					
					@if (session('msg'))
					<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">×</button>
						{{ session('msg') }}
					</div>



					@elseif(session('failed'))
					<div class="alert alert-danger" role="alert">
						<button type="button" class="close" data-dismiss="alert">×</button>
						{{ session('failed') }}
					</div>
					@endif
                </div>
			</div>	
                
                <div class="">

                    <div class="form-top">

                        <div class="container">
                         
                          <!--  <form class="form-design" action="submit_data" id="form" onsubmit="return validate_form();" method="post">
							{{ csrf_field() }}

                                <div class="form-group">
                                    <div class="row">

                                        <label class="control-label col-7" for="name">Name <span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                                        </div>

                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">

                                        <label class="control-label col-7" for="email">Email ID<span>:</span></label>

                                        <div class="col-5">
                                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                                        </div>

                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                             <!--   <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="ign">IGN (In-game Name)<span>:</span></label>

                                        <div class="col-5">
                                            <input type="text" class="form-control" id="ign"  name="ign" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="phone">Phone Number<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="phone" name="phone" required value="{{old('phone')}}"   maxlength="10" onkeypress="return isNumberKey(event);">
											<!--input type="button" onclick="otp_send(document.getElementById('phone').value);" class="btn btn-sm btn-success" value="GET OTP">
											<input type="hidden" name="txt_otp" id="txt_otp" value="" class="form-control"
                                        </div>


                                        @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div> -->
								<!--div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="phone">OTP<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="otp" name="otp" required>
                                        </div>
                                    </div>
                                </div-
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="country">Country<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="country" name="country" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="state">State<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="state" name="state">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="state">Age<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="age" name="age" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="md">Match Date<span>:</span></label>
                                        <div class="col-5">
                                          <select class="form-control fewf" id="match_date" name="match_date" required>
											<option value="">Select Match Date.</option>
											{{--<option value="2020-08-25">25th Aug</option>--}}
											{{--<option value="2020-08-26">26th Aug</option>--}}
											{{--<option value="2020-08-27">27th Aug</option>--}}
											{{--<option value="2020-08-28">28th Aug</option>--}}

                                              {{--<option value="2020-09-01">1st Sept</option>--}}
                                              {{--<option value="2020-09-03">3rd Sept</option>--}}
                                              {{--<option value="2020-09-05">5th Sept</option>--}}
                                              {{--<option value="2020-09-06">6th Sept</option>--}}
                                              {{--<option value="2020-09-08">8th Sept</option>--}}
                                              <option value="2020-09-10">10th Sept</option>
										  </select>
                                        </div>
                                    </div>
                                </div> 

                                <div class="form-group">
                                    <div style="text-align: center;justify-content: center" class="row">
                                       <button  type="submit" class="sub-btn" >Submit</button>

                                        {{--Registration Closed!--}}

                                    </div>
                                </div>

                            </form>   <p class="tc">*Terms and Conditions Apply</p> -->
                          
                        </div>

                    </div>
                </div>
				<div class="lgoright bottomar">
			 <img src="{{ url('/img/butterfly.png') }}" alt="" class="logohps bflys">
			</div>
			
            </div>
        </div>
    </div>

    </div>
</header>
<!--------------------------------------------------------------


 section
---------------------------------------------------------------->
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="custom-title">About<br> <span>The Event</span>
                </h1>
                <p>
                   Microgravity Gaming League FIFA 21 CHAMPIONSHIP is India’s biggest FIFA tournament to be held in 2 days where the best of the best compete against each other to score more goals before the whistle blows. Our online tournament, organised by Battlefy is flooded with talent from all across India. The tournament takes place on the 8th and 9th of May, 2021. For every FIFA player in India, these are going to be the most glorious 2 days of their life.</p>
				   <!-- <p class="">Are you ready to get those guns blazing? </p>-->
                <!--<p class="sub-about">Are you ready to hit the battleground in the first game of Garena Free Fire?</p> -->
                <p class="sub-about">Register today and stand a chance to win prizes worth upto ₹2,00,000*</p>
                <a class="btn register-btn" href="#" data-toggle="modal" data-target="#exampleModalLong">Rules</a>
				                <a class="btn register-btn" data-toggle="modal" data-target="#exampleModalLong2" href="#">How To Play</a>



            </div>
            <div class="col-md-6">
                <div class="about-image-box text-center">
                   <img src="{{ url('/img/About-the-event.jpg') }}" alt="">
                   
					 <a class="btn register-btn" data-toggle="modal" data-target="#exampleModal" href="#">Register</a>
                </div>
            </div>
        </div>  <!--row ends here-->
    </div>  <!--container ends here-->
</section>
<!-- Modal -->
<div style="z-index: 1000000000;" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div style="background-color: #000000;" class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: #ffffff;" aria-hidden="true">&times;</span>
                </button>
                    <div class="form-top">

                        <div class="container">
                            <h1>Registration Closed</h1>
                            <form class="form-design" action="submit_data" id="form1" onsubmit="return validate_form1();" method="post">
                                {{ csrf_field() }}
								<input type="hidden" name="amount1" id="amount1" value="50">
                                <div class="form-group">
                                    <div class="row">

                                        <label class="control-label col-6" for="name">Name <span>:</span></label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="name1" name="name" value="{{old('name')}}" required>
                                        </div>

                                        @if($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">

                                        <label class="control-label col-6" for="email">Email ID<span>:</span></label>

                                        <div class="col-6">
                                            <input type="email" class="form-control" id="email1" name="email" value="{{old('email')}}" required>
                                        </div>

                                        @if($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
								
								 <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-6" for="phone">Phone Number<span>:</span></label>
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="phone1" name="phone" required value="{{old('phone')}}"  maxlength="10" onkeypress="return isNumberKey(event);"><!--input type="button" onclick="otp_send1(document.getElementById('phone1').value)" class="btn btn-sm btn-success" value="GET OTP">
											<input type="hidden" name="txt_otp1" id="txt_otp1" value="" class="form-control"-->
                                        </div>

                                        @if($errors->has('phone'))
                                            <div class="error">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                </div>
								
								<div class="form-group">
								 <div class="row">
								  <label class="control-label col-6" for="phone">Gender<span>:</span></label>
								  <div class="col-6">
								<div class="form-check form-check-inline">
								  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
								  <label class="form-check-label" for="inlineRadio1">Male</label>
								</div>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
									  <label class="form-check-label" for="inlineRadio2">Female</label>
									</div>
								</div>
								</div>
								</div>
								<!--
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="ign">IGN (In-game Name)<span>:</span></label>

                                        <div class="col-5">
                                            <input type="text" class="form-control" id="ign1"  name="ign1" required>
                                        </div>
                                    </div>
                                </div>
                               
								<div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="phone">OTP<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="otp1" name="otp1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="country">Country<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="country1" name="country1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="state">State<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="state1" name="state1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="state">Age<span>:</span></label>
                                        <div class="col-5">
                                            <input type="text" class="form-control" id="age1" name="age1" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="control-label col-7" for="md">Match Date<span>:</span></label>
                                        <div class="col-5">
                                          <select class="form-control fewf" id="match_date1" name="match_date1" required>
											<option value="">Select Match Date.</option>
											{{--<option value="2020-08-25">25th Aug</option>--}}
											{{--<option value="2020-08-26">26th Aug</option>--}}
											{{--<option value="2020-08-27">27th Aug</option>--}}
											{{--<option value="2020-08-28">28th Aug</option>--}}
                                              {{--<option value="2020-09-01">1st Sept</option>--}}
                                              {{--<option value="2020-09-03">3rd Sept</option>--}}
                                              {{--<option value="2020-09-05">5th Sept</option>--}}
                                              {{--<option value="2020-09-06">6th Sept</option>--}}
                                              {{--<option value="2020-09-08">8th Sept</option>--}}
                                              <option value="2020-09-10">10th Sept</option>
										  </select>
                                        </div>
                                    </div>
                                </div>-->
                                {{--<div class="form-group">--}}
                                    {{--<div style="text-align: center;justify-content: center" class="row">--}}
                                        {{--<button type="submit"  class="sub-btn" >Submit</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </form>
                            <p class="tc">*Terms and Conditions Apply</p>
                        </div>

                    </div>

            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------
What you Get section
---------------------------------------------------------------->
<section class="what-you-get" id="what-you-get">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="custom-title about-title"><span>What You Get</span>
            </div>
        </div> <!--row ends here-->

        <div class="row">
            <div class="col-md-12 newgrids">
			
                <ul class="what-you-get-icons">
                   <li>
                        <div>
                            <img src="{{ url('/img/mglprizes/pr1.jpg') }}" alt="">
                        </div>
                        <p class="netgs">1st Prize</p> 
						<p> HP Zbook 14U </p>
						<span>G6 Laptop</span>
						
                    </li>
					
					 <li>
                        <div>
                            <img src="{{ url('/img/mglprizes/pr2.jpg') }}" alt="">
                        </div>
                        <p class="netgs">2nd Prize</p> 
						<p>HP 24F IPS </p>
						<span>Monitor</span>
						
                    </li>
					

                   

                    <li>
                        <div>
                            <img src="{{ url('/img/mglprizes/pr3.jpg') }}" alt="">
                        </div>
                        <p class="netgs">3rd Prize</p> 
						<p>MG Vouchers worth</p>
						<span>INR 10,000</span>
						
                    </li>
					
					 <li>
                        <div>
                            <img src="{{ url('/img/prize1.jpg') }}" alt="">
                        </div>
                        <p class="netgs">Gamer Goddess<br>(Top Female Gamer) </p> 
						<p> HP Reverb </p>
						<span>VR Headset</span>
						
                    </li>
					
                    <li>
                        <div>
                            <img src="{{ url('/img/mglprizes/pr4.jpg') }}" alt="">
                        </div>
                        <p class="netgs">Top Scorer</p> <br>
						<p> MG Vouchers worth</p>
						<span>INR 5,000</span>
						
                    </li>
					
					 <li>
                        <div>
                            <img src="{{ url('/img/mglprizes/pr5.jpg') }}" alt="">
                        </div>
                        <p class="netgs">Best Goal</p> <br>
						<p>MG Vouchers worth</p>
						<span>INR 5,000</span>
						
                    </li>
                   
                </ul> 
            </div>
        </div> <!--row ends here-->
    </div> <!--container ends here-->
</section>
<!--------------------------------------------------------------
TOURNAMENT FLOW section
---------------------------------------------------------------->
<section class="t-flow" id="t-flow">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 style="color: #ffffff;" class="custom-title about-title"><span>TOURNAMENT FLOW</span></h1>
                <p class="t-flow-subtext">2 days, 3 phases, 1024 players. Things get more intense with each phase and everyone battles it out to be the last standing player.

                </p>
            </div>
        </div>

        <div  class="row">
            <div class="col-md-12">
                <ul class="qr">
                    <li>
                        <div class="qr-box">

                            <h4 class="t-title">Qualifier Phase</h4>
                            <p>
                                After successful registrations of the participants, we will shortlist them on a first come first serve basis. The first 1024 participants will go up against each other.
                            </p>
                            <div class="arrow">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="qr-box">
                            <h4 class="t-title">Battle Phase</h4>
                            <p>The qualified participants will battle against each other in 6 rounds. The rounds will be held in single-elimination format. The top 16 participants will then move to the Zero Hour Phase.
                            </p>
                            <div class="arrow">
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="qr-box">
                            <h4 class="t-title">Zero Hour Phase</h4>
                            <p>Top 16 participants will battle against each other and their matches will be broadcast on Microgravity’s YouTube channel. We will be on the lookout for the Gamer Goddesses, Best Goal and the Top Scorer. The top 2 participants of the tournament will battle against each other to win the Microgravity Gaming League – FIFA 21 Championship.
                            </p>
                        </div>
                    </li>
 
                </ul>
            </div>
            <a style="margin: auto;" class="btn register-btn" data-toggle="modal" data-target="#exampleModal" href="#">Register</a>
        </div>

    </div>
</section>

<!--------------------------------------------------------------
TOURNAMENT section
---------------------------------------------------------------->
<!--<section class="tour" id="tour">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="custom-title about-title"><span>TOURNAMENTS</span>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <table class="s-data">
                    <tr>
                        <th>Qualifiers</th>
                        <th>Dates</th>
                        <th>Status</th>
                    </tr>
                    <tbody><tr>
                        <td>Qualifiers 1</td>
                        <td>25th Aug</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>

                    </tr>
                    <tr>
                        <td>Qualifiers 2</td>
                        <td>26th Aug</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>

                    </tr>



                    <tr>
                        <td>Qualifiers 3</td>
                        <td>1st Sept</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>

                    </tr>
                    <tr>
                        <td>Qualifiers 4</td>
                        <td>3rd Sept</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>

                    </tr>

                    <tr>
                        <td>Qualifiers 5</td>
                        <td>5th Sept</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>

                    </tr>

                    <tr>
                        <td>Qualifiers 6</td>
                        <td>6th Sept</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>


                    </tr>

                    <tr>
                        <td>Qualifiers 7</td>
                        <td>8th Sept</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>
                    </tr>


                    <tr>
                        <td>Qualifiers 8</td>
                        <td>10th Sept</td>
                        <td><a data-toggle="modal" data-target="#" href="#">Closed</a></td>

                    </tr>

                    <tr>
                        <td class="finaltext" colspan="3">
                            FINALE


                        </td>

                    </tr>
                    </tbody></table>

              <div class="kkbk">
                  <a class="kbee" data-toggle="modal" data-target="#exampleModalLong" href="#">Rules and How to Play</a>

                  <br><br>
                  <p>
                      * Gaming sessions begin from 12PM on each qualifying tournament date. You will also receive an SMS with relevant details on your registered date, 5 minutes before your session. So, be ready!
                      <br> For any queries, connect with us
                      <a target="_blank" href="https://www.facebook.com/GamingMonk">here</a>
                  </p>
              </div>

            </div>
        </div> 
    </div> 
</section> -->



<section class="what-you-get itshertime" id="mg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center imageheadings">
                <!--<h1 class="custom-title about-title"><span>MICROGRAVITY</span></h1>-->
				<img src="{{ url('/img/gamersgodness.png') }}">
            </div>
        </div> <!--row ends here-->

        <div class="row">
            <div class="mx-auto col-md-8 box-mg">
               <!-- <p>Bringing to you a world-class entertainment hub & a gaming arena, Microgravity caters to your gaming requirements with state-of-the-art free-roaming technology for multiplayer virtual reality games. With a golf experience using cutting edge projection & simulation technology, the arena also boasts of world-class simulators, virtual reality bays and classic video gaming docks.</p>
                <p>We aim to propagate and encourage e-sports in India with the Microgravity Gaming League.
                </p>-->
				<p>We are on a hunt for India’s Top Female Gamers or what we like to call them, Gamer Goddesses. With every Microgravity Gaming League Tournament, we pick the top female gamer and help her reach the International Leagues where these Goddesses will be representing our country. Announced on
Women’s Day, we began encouraging female gamers to go out there with our #ItsHerGame
campaign and saw an immense support from the female gamer community. </p>
                <a class="coming-btn" href="#">It’s her time now.</a>
            </div>
        </div> <!--row ends here-->
    </div> <!--container ends here-->
</section>


<!--------------------------------------------------------------
Mg section
---------------------------------------------------------------->
<section class="what-you-get" id="mg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="custom-title about-title"><span>MICROGRAVITY</span></h1>
				
            </div>
        </div> <!--row ends here-->

        <div class="row">
            <div class="col-md-12 box-mg">
                <p>Microgravity stands for bringing to life your dreams. It’s a magical world crafted with technology. </p>
                <p>Microgravity as a brand is working on delivering a world-class multi-player gaming experience. Whether you want to play at a state-of-the-art gaming arena or try your hand at competing with your friends in an e-sports league format; we bring to you the best infrastructure & platforms the industry has to offer. </p>
				<p>To start with, we are introducing cutting edge free-roaming technology for multiplayer gaming at our first location in Gurgaon along with some of the best immersive gaming formats. The arena boasts world-class simulators, virtual reality bays, classic video gaming docks and a golf experience using cutting edge projection & simulation technology.</p>
                <a class="btn register-btn" href="http://www.microgravity.co.in/" target="_blank" style="color:#000;">Know More</a>
            </div>
        </div> <!--row ends here-->
    </div> <!--container ends here-->
</section>






<div  class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog rule-mglsd" role="document">
        <div style="background-color: #000000;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title r-title" id="exampleModalLongTitle">How To Play</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: #ffffff;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body rules news-rls">
				
				<h5>Register with Microgravity </h5><br>
			
<ul>
	<li> Fill in all your details and Click on Submit.</li>
	<li>You will be redirected to Batlefy's page.</li>
</ul>

				<h5>Create a Battlefy Account</h5><br>
				
				<p>First create your Battlefy account by going to battlefy.com and clicking 'Sign Up' on the bottom, left-hand of the window:</p>
				
				<div class="text-center">
				<img src="/img/fifahow/onecreate.jpg" style="width:100%; margin:20px 0;">
				</div>
				<p>Create a login via email or use one of our other sign-in methods:</p>
				
				<div class="text-center">
				<img src="/img/fifahow/twocreate.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<p>Be sure to update your timezone!</p>
				
				<div class="text-center">
				<img src="/img/fifahow/threecreate.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<p><strong>Note:</strong> We're here to support you with questions you may have about the tournament itself or using Battlefy! The best way to reach us is via the Microgravity Discord Server. Please see the "Contact" tab on the tournament page for the invite link.</p>
				
				<h5>Joining the Tournament</h5>
				
				<div class="text-center">
				<img src="/img/fifahow/joining.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<p>Read and Accept all the Rules:</p>
				
				<div class="text-center">
				<img src="/img/fifahow/fillyou.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<p>Fill in your information:</p>
				
			
				<div class="text-center">
				<img src="/img/fifahow/inthegame.jpg" style="width:100%; margin:20px 0;">
				<img src="/img/fifahow/sampletour.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<p>After completing all of the questions you will be taken back to the main tournament page. The right side of the page will now show a place to edit your registration info and how long before the Tournament begins.  You are now registered and just need to wait for game day to arrive.</p>
				
				
				<div class="text-center">
					<img src="/img/fifahow/payguid.jpg" style="width:100%; margin:20px 0;">
				</div>
				<p>If you have any problems at this point, you will need to ask the Tournament Administrators via the Microgravity Discord server.</p>
				<p>Adding Friends on PlayStation 4- click <a href="https://manuals.playstation.net/document/gb/ps4/friends/request.html" target="_blank">here</a></p> 
				
				<h5>About the 90-Rated Online Friendlies Mode</h5><br>
				
				<ul>
					<li>90-Rated Online Friendlies Mode is a version of the ‘Online Friendlies’ mode within FIFA 20 that normalizes all in-game player statistics and overall ratings to the same value, meaning every player is as good as each other.</li>
					<li>This makes the game even and fair for every club, whether you are playing as Liverpool or Luton Town.</li>
					<li>This guide will show you how to set up a game of 90-Rated Online Friendlies.</li>
					<li>We recommend that you test this before the tournament if you are unfamiliar with the mode so that you can be as prepared as possible for kick-off.</li>
				</ul>
				
				<h5>1. Navigate to the Online Tab of the FIFA Hub and select the Online Friendlies tile.</h5><br>

				<div class="text-center">
					<img src="/img/fifahow/desk1.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<h5>2. Select New Friendly Season (or recent opponents if you have played the opponent before).</h5><br>
				<div class="text-center">
					<img src="/img/fifahow/desk2.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<h5>3. Select an opponent to play against. This player must be on your PlayStation/Xbox Friends List.</h5><br>
				
				<div class="text-center">
					<img src="/img/fifahow/desk3.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<h5>4. After selecting an opponent go to the Settings tile and scroll to 90 Overall under the Squad type.</h5><br>
				
				<div class="text-center">
					<img src="/img/fifahow/desk4.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<h5>5. After selecting Squad settings the game can begin by pressing on the Invite tab.</h5><br>
				
				<div class="text-center">
					<img src="/img/fifahow/desk5.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<h5>On Game Day</h5><br>
				<p>In this section you’ll be guided through the tournament experience, where we’ll show you everything you need to know to play your tournament matches on Battlefy.</p>
				<p>If you are using your mobile device to access Battlefy, you will find some of the sections shown on the following pages under the “Play” button at the bottom of the tournament page.</p>
				
				<h5>Navigating to the Tournament page</h5><br>
				
				<p>The Tournament page is where you should be for the duration of the tournament</p>
				<ul>
					<li>1. Go to battlefy.com (On mobile, tap the menu button on top left).</li>
					<li>2. Select the Joined Tournaments option Select ‘Go to Tournament.'</li>
				</ul>
				
				<div class="text-center">
					<img src="/img/fifahow/scr1.jpg" style="width:100%; margin:20px 0;">
					<img src="/img/fifahow/joinedtourn.jpg" style="width:100%; margin:20px 0;">	
				</div>
				
				<h5>Prepare for the Tournament</h5><br>
				
				<ul>
					<li>You must arrive on the tournament page and verify your registration fields are correct.</li>
					<li>All critical tournament information will be displayed on the tournament page, so make sure to stay on it for the duration of the tournament.</li>
					<li>Once the tournament starts, your first match will become available. Although it will be scheduled for several days after the tournament begins, you are still able to reschedule it for a new time on the match page (see "Rescheduling Your Match")</li>
					<li>Once on your match page, you will need to follow the instructions at the top of the page to set up your match against your opponent. The player on the left side of the match page should invite the player on the right side in-game.</li>
					<li>The player that creates the invitation should set the match settings to 90-Rated and the settings provided in the About the 90-Rated Online Friendlies Mode section of this guide.
					Players will play one game against each other to determine the winner, and where a game ends in a draw, players will play a second game against each other, with ‘Golden Goal’ to determine the winner, i.e., the first player to score in the second match is the winner. If a Golden Goal game ends in a draw, another Golden Goal game will be played, until there is a winner.</li>
				</ul>
				
			<h5>Playing in an Elimination Tournament</h5><br>
			<ul>
					<li>Matches will continue to be played until a Champion is crowned in the Grand Finals.</li>
			</ul>

				<div class="text-center">
					<img src="/img/fifahow/desk6.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<h5>If you have a problem with your match</h5><br>
				<ul>
				<li>If you have a problem with your match, select Report Match Issue on the Match Page to notify admins.</li>
				<li>Communicate with admins via the match chat on the Match Page.</li>
				<li>Admins will arrive shortly to resolve your issue, please wait in the match chat for them to arrive.</li>
				</ul>
				
				<div class="text-center">
					<img src="/img/fifahow/last.jpg" style="width:100%; margin:20px 0;">
				</div>


            </div> 

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div  class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog rule-mglsd" role="document">
        <div style="background-color: #000000;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title r-title" id="exampleModalLongTitle">Rules</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span style="color: #ffffff;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body rules news-rls">
				<h5>Playing Matches</h5>
				<p>To play, you will need:</p>
				<ul>
					<li>PlayStation 4 Console </li>
					<li>PlayStation Plus (for PlayStation 4) subscription to play online.</li>
					<li>and the EA SPORTS FIFA 21 video game</li>
				</ul>
				
				<p>If a player does not appear within 10 minutes of the posted Official Match Time, they will forfeit the match and their opponent will win by default.</p>
<p>Player or the left side of the Battlefy match page, sets up the lobby and invites the opponent. In case of more than 1 game being played, the players alternate invites.</p>
<p>Upon completing their match, players must report their score on the Battlefy match page within five minutes of the match finishing.</p>

				
				<h5>Gameplay Settings</h5>
				<p>All matches will be played using 90-Rated Online Kick-Off Mode (90-Rated Online Kick-Off mode normalizes all in-game player statistics and overall ratings to the same value, meaning every player is as good as each other). </p>
				
				<div class="text-center">
				<img src="/img/fifahow/settingscont.jpg" style="width:100%; margin:20px 0;">
				</div>
			<p>This can be accessed and set up by following these instructions:</p>	
				<ul>
					<li>Navigate to the ‘Online’ tab of your FIFA Main Menu Hub.</li>
					<li>Select the ‘Online Friendlies’ tile</li>
					<li>Select ‘New Friendly Season’</li>
					<li>Select the opponent you would like to play against (opponent must be added as a friend)</li>
					<li>After selecting an opponent, navigate to the ‘Settings’ tile.</li>
					<li>Press A and scroll down to ‘Squad Type’, change this to ’90-Rated.’</li>
					<li>Navigate to the ‘Invite’ tile and hit A  to invite your opponent and begin the match.</li>
				</ul>
				
				<p>All matches will use default settings aside from the 90-rated mode mentioned above.</p>
				<p>You are permitted to play with any footballer from your club in your starting 11 and substitutes.</p>

				
				<h5>Communication</h5>
				<ul>
					<li>Players’ communication outside of ‘Battlefy Match Chat’ and the official Discord server will not be considered for the purposes of any administrative decision making. Tournament administrators do not have access to any social channels such as Twitter and messages sent via those channels will not be reviewed as part of administrative decisions.</li>
					<li>Players should be in the Competition’s match page throughout the event so that they are easily reachable by tournament administrators.</li>
					<li>Players must message their opponent on ‘Battlefy Match Chat’ to set up their match.</li>
					
				</ul>
				
				<h5>Broadcasting Rules</h5>
				
				<ul>
					<li>Both the players need to stream their pov on YouTube link provided by us.</li>
					<li>Both the players need to play on same graphic setting to make it even.</li>
					<li>For Facecam, you've to join the video call through your mobile/laptop device, please be aware that your live reaction will be shown on the stream, so do not speak or act inappropriately which may hurt feeling of audience.</li>
					
				</ul>
				
				<h5>Disputes and Reporting</h5>
				<ul>
					<li>It is each player’s responsibility to verify that the game settings are correct and that they have followed the Terms and Conditions set out in this document.</li>
					<li>If any player believes that their opponent is in breach of the Terms and Conditions, they must immediately report this to a tournament administrator. This is done by the ‘Report Match Issue’ button on the Battlefy websites match page.</li>
					<li>If a match is played beyond the first half with incorrect settings before a tournament administrator is contacted, then the match score will stand.</li>
					<li>If a player is found to be in breach of the Terms and Conditions and the tournament administrators deem that this warrants a match loss or that a player is disqualified, then the opponent will be given a 3-0 win for that match, unless they already had more than a three-goal difference at the time of reporting the issue.</li>
				</ul>
				
				<h5>Connection Issues and Disconnects</h5>
				
				<p>The below graphic demonstrates the process for players if there are connection issues when trying to start a match:</p>

				
				<div class="text-center">
				<img src="/img/fifahow/sett2.jpg" style="width:100%; margin:20px 0;">
				</div>
				
				<ul>
				<li>If neither player can successfully invite the other, players must contact tournament administrators by reporting a match issue, within fifteen (15) minutes of that round beginning. Failure to do so will result in both players receiving a loss.</li>
				</ul>
				
				<p>Players are required to take the following actions immediately after contacting tournament administrators</p>
				<ul>
				<li>Players should swap who invites.</li>
				<li>Both players must restart their internet modem.</li>
				<li>Both players must restart their router (if connected); and/or</li>
				<li>Both players must restart their console</li>
				<li>As per the above graphic, if after twenty (20) minutes from the start of that round beginning, players cannot get connected then tournament administrators will assign a loss to both players and record the incident.</li>
				</ul>
				
				<p>If connection issues arise between games or during a game and players cannot get reconnected then they must contact a tournament administrator immediately. Players must take the steps above and reconnect within 10 minutes or a double loss will be applied and recorded.</p>
				<p>If you experience a disconnect, take a screenshot and notify a tournament administrator in ‘Battlefy Match Chat’ and restart the match with the correct score starting at the time of disconnect.</p>
				<p>If a set of players have repeated connection issues in the same match that is delaying the start of the next round, a double loss may be applied at the discretion of the head tournament administrator.</p>
				<p>Players who have continuous connection issues may be removed from the tournament at the discretion of the head tournament administrator.</p>

				<h5>General Rules –</h5>
				<ul>
				<li>All decisions made by the organizers shall be final.</li>
				<li>All Teams and Players must behave in an appropriate and respectful manner towards other Teams and Players, Tournament officials, and administrators.</li>
				<li>All Players participating in the League must be at least 16 years of age.</li>
				<li>The players must use their own devices to play. Playing with any kind of emulator is strictly forbidden and will result in disqualification.</li>
				<li>No abusive names/religious names will be considered as a Team/Player name.</li>
				<li>Each team should be ready to start the game 30 minutes prior to their official start time. If any team is not ready at this time, then they are subject to penalties being applied.</li>
				<li>After tournament registration is over the tournament organisers will verify and email the players with further information with schedule and brackets to the registered email address of the participants.</li>
				<li>All prize money will be paid out, at least within 60 days after the Final match is completed. If a Player is missing the proper information and makes no effort to fix this, the prize money will not be paid out until it is rectified.</li>
				<li>There cannot be any reschedule of any matches unless informed by the tournament organisers themselves for any change.</li>
				</ul>
				

            </div> 

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

    <script>
        @if($errors->any())

        $('#exampleModal').modal('show');


        @endif


        $('form').submit(function(){
            $(this).find(':submit').attr( 'disabled','disabled' );
            //the rest of your code
            setTimeout(() => {
                $(this).find(':submit').attr( 'disabled',false );
            }, 2000)
        });

    </script>




@endsection